<?php

/**
 * This file is part of the Ukulele Cifras Chord Generator.
 *
 * Created by Thiago Colares
 *
 * (c) Contributors of the Ukulele Cifras project - www.ukulelecifras.com.br
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

namespace ChordGenerator\Model;

class FretMapAlternativesFactory
{
    static public function create($fretboard, $fretboardSliceLength, $formulaNotes)
    {
        $firstInitialFret = 1;
        $lastInitialFret = count($fretboard[0]) - $fretboardSliceLength;
        $chordFretMapAlternatives = [];

        foreach (range($firstInitialFret, $lastInitialFret) as $initialFret) {
            $cleanFretboard = self::getFretboardSliceFilteredByNotes($fretboard, $initialFret, $fretboardSliceLength, $formulaNotes);
            foreach ($cleanFretboard[0] as $fret0 => $note0) {
                $chordFretMap = [strval($fret0)];
                foreach ($cleanFretboard[1] as $fret1 => $note1) {
                    $chordFretMap[] = strval($fret1);
                    foreach ($cleanFretboard[2] as $fret2 => $note2) {
                        $chordFretMap[] = strval($fret2);
                        foreach ($cleanFretboard[3] as $fret3 => $note3) {
                            $chordFretMap[] = strval($fret3);
                            $chordNotes = self::getChordNotesFromChordFretMap($fretboard, $chordFretMap);
                            if (empty(array_diff($formulaNotes, $chordNotes)) && !in_array($chordFretMap, $chordFretMapAlternatives)) {
                                $chordFretMapAlternatives[] = $chordFretMap;
                            }
                            array_pop($chordFretMap);
                        }
                        array_pop($chordFretMap);
                    }
                    array_pop($chordFretMap);
                }
                array_pop($chordFretMap);
            }
        }
        return $chordFretMapAlternatives;
    }


    static function getFretboardSliceFilteredByNotes($fretboard, $initialFret, $sliceLength, $notes)
    {
        return array_map(function ($string) use ($initialFret, $sliceLength, $notes) {
            $slice = [$string[0]] + array_slice($string, $initialFret, $sliceLength, true);
            return self::filterStringByNotes($slice, $notes);
        }, $fretboard);
    }


    static function filterStringByNotes($string, $notes)
    {
        return array_filter($string, function ($note) use ($notes) {
            return in_array($note, $notes);
        });
    }


    static function getChordNotesFromChordFretMap($fretboard, $chordFretMap)
    {
        return [$fretboard[0][$chordFretMap[0]], $fretboard[1][$chordFretMap[1]], $fretboard[2][$chordFretMap[2]], $fretboard[3][$chordFretMap[3]]];
    }
}
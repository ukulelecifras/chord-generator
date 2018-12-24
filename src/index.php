<?php
/**
 * This file is part of the PhpStorm.
 *
 * Created by Thiago Colares
 *
 * (c) Contributors of the Ukulele Cifras project - www.ukulelecifras.com.br
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

require_once __DIR__ . '/bootstrap.php';

function getFormulaNotesByTonality($keys, $formula, $tonality)
{
    return array_map(function ($key) use ($keys, $tonality) {
        return $tonality[$keys[$key]];
    }, $formula);
}


function uniqueAndSort($notes)
{
    $uniqueNotes = array_unique($notes);
    sort($uniqueNotes);
    return $uniqueNotes;
}


function filterStringByNotes($string, $notes)
{
    return array_filter($string, function ($note) use ($notes) {
        return in_array($note, $notes);
    });
}


function getFretboardSliceFilteredByNotes($fretboard, $initialFret, $sliceLength, $notes)
{
    return array_map(function ($string) use ($initialFret, $sliceLength, $notes) {
        $slice = [$string[0]] + array_slice($string, $initialFret, $sliceLength, true);
        return filterStringByNotes($slice, $notes);
    }, $fretboard);
}


function printChordFretMaps($chords)
{
    foreach ($chords as $chord) {
        print "[" . implode(' ', $chord) . "]" . PHP_EOL;
    }
}


function getChordNotesFromChordFretMap($fretboard, $chordFretMap)
{
    return [$fretboard[0][$chordFretMap[0]], $fretboard[1][$chordFretMap[1]], $fretboard[2][$chordFretMap[2]], $fretboard[3][$chordFretMap[3]]];
}


function makeChordFretMapAlternatives($fretboard, $fretboardSliceLength, $formulaNotes) {
    $firstInitialFret = 1;
    $lastInitialFret = count($fretboard[0]) - $fretboardSliceLength;
    $chordFretMapAlternatives = [];

    foreach (range($firstInitialFret, $lastInitialFret) as $initialFret) {
        $cleanFretboard = getFretboardSliceFilteredByNotes($fretboard, $initialFret, $fretboardSliceLength, $formulaNotes);
        foreach ($cleanFretboard[0] as $fret0 => $note0) {
            $chordFretMap = [strval($fret0)];
            foreach ($cleanFretboard[1] as $fret1 => $note1) {
                $chordFretMap[] = strval($fret1);
                foreach ($cleanFretboard[2] as $fret2 => $note2) {
                    $chordFretMap[] = strval($fret2);
                    foreach ($cleanFretboard[3] as $fret3 => $note3) {
                        $chordFretMap[] = strval($fret3);
                        $chordNotes = getChordNotesFromChordFretMap($fretboard, $chordFretMap);
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

$countChords = 0;
foreach (\ChordGenerator\Model\Tonality::$chromaticScale as $rootNote) {
    $tonality = \ChordGenerator\Model\Tonality::getTonality($rootNote);
    print implode(' ', $tonality) . PHP_EOL;

    $fretboard = \ChordGenerator\Model\UkuleleFretboard::$fretboard;
    $keys = \ChordGenerator\Model\Key::$keys;
    $majorFormula = \ChordGenerator\Model\Formula::$major;

    $formulaNotes = getFormulaNotesByTonality($keys, $majorFormula, $tonality);

    $fretboardSliceLength = 4; // human-hand possible
    $chordFretMapAlternatives = makeChordFretMapAlternatives($fretboard, $fretboardSliceLength, $formulaNotes);
    printChordFretMaps($chordFretMapAlternatives);

    $countChords+=count($chordFretMapAlternatives);

    print PHP_EOL;
}

print PHP_EOL . "$countChords chords" . PHP_EOL;








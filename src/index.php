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

$fretboard = \ChordGenerator\Model\UkuleleFretboard::$fretboard;
$keys = \ChordGenerator\Model\Key::$keys;
$tonalityC = \ChordGenerator\Model\Tonality::$c;
$majorFormula = \ChordGenerator\Model\Formula::$major;
$minorFormula = \ChordGenerator\Model\Formula::$major;
$rootNote = 'C';

$majorChordNotes = array_map(function ($key) use ($keys, $tonalityC) {
    return $tonalityC[$keys[$key]];
}, $majorFormula);

print_r($majorFormula);
print_r($majorChordNotes);

$minorChordNotes = array_map(function ($key) use ($keys, $tonalityC) {
    return $tonalityC[$keys[$key]];
}, $minorFormula);

print_r($minorFormula);
print_r($minorChordNotes);

// Print fretboard
foreach ($fretboard as $stringNumber => $string) {
    print "string: $stringNumber --> ";
    foreach ($string as $fretNumber => $fret) {
        print "[$fretNumber] " . str_pad($fret,2) . ", ";
    }
    print PHP_EOL;
}

$chordNotes = $minorChordNotes;
$fretboardLength = 4;
$initialFret = 1;
$chords = [];

foreach (range(1, count($fretboard[0])-$fretboardLength) as $initialFret) {
    foreach (([$fretboard[0][0]] + array_slice($fretboard[0], $initialFret, $fretboardLength, true)) as $fretNumber0 => $note0) {
        $chord = [];
        if (in_array($note0, $chordNotes)) {
            $chord[] = strval($fretNumber0);
            foreach (([$fretboard[1][0]] + array_slice($fretboard[1], $initialFret, $fretboardLength, true)) as $fretNumber1 => $note1) {
                if (in_array($note1, $chordNotes)) {
                    $chord[] = strval($fretNumber1);
                    foreach (([$fretboard[1][0]] + array_slice($fretboard[2], $initialFret, $fretboardLength, true)) as $fretNumber2 => $note2) {
                        if (in_array($note2, $chordNotes)) {
                            $chord[] = strval($fretNumber2);
                            foreach (([$fretboard[1][0]] + array_slice($fretboard[3], $initialFret, $fretboardLength, true)) as $fretNumber3 => $note3) {
                                if (in_array($note3, $chordNotes)) {
                                    $chord[] = strval($fretNumber3);

                                    $chordUniqueNotes = array_unique([$fretboard[0][$chord[0]], $fretboard[1][$chord[1]], $fretboard[2][$chord[2]], $fretboard[3][$chord[3]]]);
                                    sort($chordUniqueNotes);

                                    $majorChordUniqueNotes = array_unique($chordNotes);
                                    sort($majorChordUniqueNotes);

                                    if ($chordUniqueNotes == $majorChordUniqueNotes && !in_array($chord, $chords)) {
                                        $chords[] = $chord;
                                    }
                                    array_pop($chord);
                                }
                            }
                            array_pop($chord);
                        }
                    }
                    array_pop($chord);
                }
            }
            array_pop($chord);
        }
    }
}
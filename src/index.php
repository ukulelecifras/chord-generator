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
$rootNote = 'C';

$majorChordNotes = array_map(function ($key) use ($keys, $tonalityC) {
    return $tonalityC[$keys[$key]];
}, $majorFormula);

print_r($majorFormula);
print_r($majorChordNotes);


// Print fretboard
foreach ($fretboard as $stringNumber => $string) {
    print "string: $stringNumber --> ";
    foreach ($string as $fretNumber => $fret) {
        print "[$fretNumber] " . str_pad($fret,2) . ", ";
    }
    print PHP_EOL;
}


$chords = [];
foreach ($fretboard[0] as $fretNumber0 => $note0) {
    $chord = [];
    if (in_array($note0, $majorChordNotes)) {
        $chord[] = strval($fretNumber0);
        foreach ($fretboard[1] as $fretNumber1 => $note1) {
            if (in_array($note1, $majorChordNotes)) {
                $chord[] = strval($fretNumber1);
                foreach ($fretboard[2] as $fretNumber2 => $note2) {
                    if (in_array($note2, $majorChordNotes)) {
                        $chord[] = strval($fretNumber2);
                        foreach ($fretboard[3] as $fretNumber3 => $note3) {
                            if (in_array($note3, $majorChordNotes)) {
                                $chord[] = strval($fretNumber3);
                                var_dump($chord);
                                $chords[] = $chord;

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
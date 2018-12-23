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

$majorFormula = ['1','3','5'];

$majorChordNotes = array_map(function ($key) use ($keys, $tonalityC) {
    return $tonalityC[$keys[$key]];
}, $majorFormula);

print_r($majorFormula);
print_r($majorChordNotes);
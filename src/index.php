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

require_once __DIR__ . '/bootstrap.php';

// Example

$countChords = 0;
$chords = ['chords' => [], 'count' => 0];
foreach (\ChordGenerator\Model\ChordGenerator::generateAll() as $chord) {
    /** @var \ChordGenerator\Model\Chord $chord */
    $countChords+=count($chord->getFretMaps());

    $chords['chords'][] = $chord->getArray();
}

$chords['count'] = $countChords;

print json_encode($chords) . PHP_EOL;
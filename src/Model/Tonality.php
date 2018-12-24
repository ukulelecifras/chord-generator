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

class Tonality
{
    static public $chromaticScale = [
        0   => 'C', // 1
        1   => 'C#',
        2   => 'D', // 2
        3   => 'D#',
        4   => 'E', // 3
        5   => 'F', // 4
        6   => 'F#',
        7   => 'G', // 5
        8   => 'G#',
        9   => 'A', // 6
        10  => 'A#',
        11  => 'B'  // 7
    ];

    static public function getTonality($rootNote)
    {
        $rootNoteIndex = array_search($rootNote, self::$chromaticScale);
        return array_merge(
            array_slice(self::$chromaticScale, $rootNoteIndex, count(self::$chromaticScale)),
            array_slice(self::$chromaticScale, 0, $rootNoteIndex)
        );
    }
}
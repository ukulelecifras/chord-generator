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

class Key
{
    static public $keys = [
        '1'   => 0,
        '#1'  => 1,
        'b2'  => 1,
        '2'   => 2,
        '#2'  => 3,
        'b3'  => 3,
        '3'   => 4,
        '4'   => 5,
        '#4'  => 6,
        'b5'  => 6,
        '5'   => 7,
        '#5'  => 8,
        'b6'  => 8,
        '6'   => 9,
        '#6'  => 10,
        'b7'  => 10,
        '7'   => 11,
        'b9'  => 1,
        '9'   => 2,
        '#9'  => 3,
        '11'  => 5,
        '#11' => 6,
        'b13' => 8,
        '13'  => 9,
    ];
}
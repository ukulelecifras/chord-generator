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

namespace ChordGenerator\Model;

class Key
{
    static public $keys = [
        '1'   => 0,
        '1#'  => 1,
        '2b'  => 1,
        '2'   => 2,
        '2#'  => 3,
        '3b'  => 3,
        '3'   => 4,
        '4'   => 5,
        '4#'  => 6,
        '5b'  => 6,
        '5'   => 7,
        '5#'  => 8,
        '6b'  => 8,
        '6'   => 9,
        '6#'  => 10,
        '7b'  => 10,
        '7'   => 11,
        '9b'  => 1,
        '9'   => 2,
        '9#'  => 3,
        '11'  => 5,
        '11#' => 6,
        '13b' => 8,
        '13'  => 9,
    ];
}
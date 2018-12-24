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

// just temporary. it not supposed to be here
class Formula
{
    static public function getFormulas()
    {
        return [
            [
                'name' => 'major',
                'formula' => ['1', '3', '5']
            ],
            [
                'name' => 'major seventh',
                'formula' => ['1', '3', '5', '7']
            ],
            [
                'name' => 'major ninth',
                'formula' => ['1', '3', '7', '9']
            ],
        ];
    }
}
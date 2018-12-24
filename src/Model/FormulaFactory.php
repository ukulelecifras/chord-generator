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

class FormulaFactory
{
    /**
     * @param string $name
     * @param string $regularFormula
     * @param string $ukuleleFormula
     * @param string $symbol
     * @return Formula
     */
    static public function create($name, $regularFormula, $ukuleleFormula, $symbol)
    {
        return new Formula(
            $name,
            explode('-', $regularFormula),
            explode('-', $ukuleleFormula),
            $symbol
        );
    }
}
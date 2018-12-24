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

namespace ChordGenerator\Service;

use ChordGenerator\Model\FormulaFactory;

class FormulaReaderService
{
    const NAME_KEY = 0;
    const REGULAR_FORMULA_KEY = 1;
    const UKULELE_FORMULA_KEY = 2;
    const SYMBOL_KEY = 3;

    public function read($filename)
    {
        $formulas = [];
        if ( ($handle = fopen($filename, 'r')) !== false ) {

            // get the first line then do nothing. just to skip it
            fgetcsv($handle, 100, ',');

            while ( ($row = fgetcsv($handle, 100, ',')) !== false) {
                $formulas[] = FormulaFactory::create(
                    $row[self::NAME_KEY],
                    $row[self::REGULAR_FORMULA_KEY],
                    $row[self::UKULELE_FORMULA_KEY],
                    $row[self::SYMBOL_KEY]);
            }
        }
        fclose($handle);
        return $formulas;
    }
}
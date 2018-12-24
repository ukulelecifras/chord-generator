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

use PHPUnit\Framework\TestCase;

class FormulaFactoryTest extends TestCase
{
    function testCreateFormulaObjectWithCorrectPropertiesValueAndType()
    {
        $formula = \ChordGenerator\Model\FormulaFactory::create('name', "1-3-5", "1-5", "symbol");
        $this->assertEquals('name', $formula->getName());
        $this->assertEquals(['1','3','5'], $formula->getRegularFormula());
        $this->assertEquals(['1','5'], $formula->getUkeFormula());
        $this->assertEquals('symbol', $formula->getSymbol());
    }
}
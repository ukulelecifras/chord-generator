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

class Formula
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $regularFormula;

    /**
     * @var array
     */
    private $ukeFormula;

    /**
     * @var string
     */
    private $symbol;

    /**
     * @var string
     */
    private $slugName;

    /**
     * Formula constructor.
     * @param string $name
     * @param array $regularFormula
     * @param array $ukeFormula
     * @param string $symbol
     * @param string $slugName
     */
    public function __construct($name, array $regularFormula, array $ukeFormula, $symbol, $slugName)
    {
        $this->name = $name;
        $this->regularFormula = $regularFormula;
        $this->ukeFormula = $ukeFormula;
        $this->symbol = $symbol;
        $this->slugName = $slugName;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getRegularFormula()
    {
        return $this->regularFormula;
    }

    /**
     * @return array
     */
    public function getUkeFormula()
    {
        return $this->ukeFormula;
    }

    /**
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @return string
     */
    public function getSlugName()
    {
        return $this->slugName;
    }
}
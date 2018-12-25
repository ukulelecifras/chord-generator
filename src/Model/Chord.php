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


class Chord
{
    /**
     * @var string
     */
    private $rootNome;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $symbol;

    /**
     * @var array
     */
    private $formula;

    /**
     * @var array
     */
    private $notes;

    /**
     * @var array
     */
    private $fretMaps;

    /**
     * Chord constructor.
     * @param string $rootNome
     * @param string $name
     * @param string $symbol
     * @param array $formula
     * @param array $notes
     * @param array $fretMaps
     */
    public function __construct($rootNome, $name, $symbol, array $formula, array $notes, array $fretMaps)
    {
        $this->rootNome = $rootNome;
        $this->name = $name;
        $this->symbol = $symbol;
        $this->formula = $formula;
        $this->notes = $notes;
        $this->fretMaps = $fretMaps;
    }

    /**
     * @return string
     */
    public function getRootNome()
    {
        return $this->rootNome;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @return array
     */
    public function getFormula()
    {
        return $this->formula;
    }

    /**
     * @return array
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @return array
     */
    public function getFretMaps()
    {
        return $this->fretMaps;
    }

    public function __toString()
    {
        $fretMaps = implode(', ', array_map(function($fretMap) {return implode('-', $fretMap);}, $this->fretMaps));
        return "{$this->rootNome}{$this->symbol} [" . implode('-', $this->formula) . "][" . implode('-', $this->notes) . "] [" . $fretMaps . "]";
    }
}
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
    private $rootNote;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $slugName;

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
     * @param string $rootNote
     * @param string $name
     * @param string $slugName
     * @param string $symbol
     * @param array $formula
     * @param array $notes
     * @param array $fretMaps
     */
    public function __construct($rootNote, $name, $slugName, $symbol, array $formula, array $notes, array $fretMaps)
    {
        $this->rootNote = $rootNote;
        $this->name = $name;
        $this->slugName = $slugName;
        $this->symbol = $symbol;
        $this->formula = $formula;
        $this->notes = $notes;
        $this->fretMaps = $fretMaps;
    }

    /**
     * @return string
     */
    public function getRootNote()
    {
        return $this->rootNote;
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
    public function getSlugName()
    {
        return $this->slugName;
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

    /**
     * @return array
     */
    public function getArray()
    {
        return [
            'name' => $this->name,
            'symbol' => $this->symbol,
            'slugName' => $this->slugName,
            'rootNote' => $this->rootNote,
            'formula' => $this->formula,
            'fretMaps' => $this->fretMaps
        ];
    }

    public function __toString()
    {
        $fretMaps = implode(', ', array_map(function($fretMap) {return implode('-', $fretMap);}, $this->fretMaps));
        return "{$this->rootNote}{$this->symbol} [" . implode('-', $this->formula) . "][" . implode('-', $this->notes) . "] [" . $fretMaps . "]";
    }
}
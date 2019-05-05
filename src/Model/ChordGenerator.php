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

class ChordGenerator
{
    static public function generateAll()
    {
        foreach (\ChordGenerator\Model\Tonality::NOTES as $rootNote) {
            $keys = \ChordGenerator\Model\Key::$keys;
            $tonality = \ChordGenerator\Model\Tonality::getTonality($rootNote);
            $fretboard = \ChordGenerator\Model\UkuleleFretboard::FRETBOARD;
            $formulas = (new \ChordGenerator\Service\FormulaReaderService())->read(__DIR__ . '/../Resources/chord-formulas.csv');
            foreach ($formulas as $formula) {
                /** @var \ChordGenerator\Model\Formula $formula */
                $formulaNotes = self::getFormulaNotesByTonality($keys, $formula->getUkeFormula(), $tonality);
                $fretboardSliceLength = 4; // human-hand possible
                $chordFretMapAlternatives = \ChordGenerator\Model\FretMapAlternativesFactory::create($fretboard, $fretboardSliceLength, $formulaNotes);

                yield ChordFactory::create(
                    $rootNote,
                    $formula->getName(),
                    $formula->getSlugName(),
                    $formula->getSymbol(),
                    $formula->getUkeFormula(),
                    $formulaNotes,
                    $chordFretMapAlternatives,
                    $formula->getSymbolVariations()
                );
            }
        }
    }

    static function getFormulaNotesByTonality($keys, $formula, $tonality)
    {
        return array_map(function ($key) use ($keys, $tonality) {
            return $tonality[$keys[$key]];
        }, $formula);
    }
}
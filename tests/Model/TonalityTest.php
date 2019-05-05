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

use ChordGenerator\Model\Tonality;
use PHPUnit\Framework\TestCase;

class TonalityTest extends TestCase
{
    /**
     * @dataProvider rootNoteTonalities
     */
    public function testReturnTonalityGivenRootNote($rootNote, $tonalityNotes)
    {
        $this->assertEquals(ChordGenerator\Model\Tonality::getTonality($rootNote), $tonalityNotes);
    }


    public function rootNoteTonalities()
    {
        return [
            ['C',  ['C', 'C#', 'D', 'D#', 'E', 'F', 'F#', 'G', 'G#', 'A', 'A#', 'B']],
            ['C#', ['C#', 'D', 'D#', 'E', 'F', 'F#', 'G', 'G#', 'A', 'A#', 'B', 'C']],
            ['D',  ['D', 'D#', 'E', 'F', 'F#', 'G', 'G#', 'A', 'A#', 'B', 'C', 'C#']],
            ['D#', ['D#', 'E', 'F', 'F#', 'G', 'G#', 'A', 'A#', 'B', 'C', 'C#', 'D']],
            ['E',  ['E', 'F', 'F#', 'G', 'G#', 'A', 'A#', 'B', 'C', 'C#', 'D', 'D#']],
            ['F',  ['F', 'F#', 'G', 'G#', 'A', 'A#', 'B', 'C', 'C#', 'D', 'D#', 'E']],
            ['F#', ['F#', 'G', 'G#', 'A', 'A#', 'B', 'C', 'C#', 'D', 'D#', 'E', 'F']],
            ['G',  ['G', 'G#', 'A', 'A#', 'B', 'C', 'C#', 'D', 'D#', 'E', 'F', 'F#']],
            ['G#', ['G#', 'A', 'A#', 'B', 'C', 'C#', 'D', 'D#', 'E', 'F', 'F#', 'G']],
            ['A',  ['A', 'A#', 'B', 'C', 'C#', 'D', 'D#', 'E', 'F', 'F#', 'G', 'G#']],
            ['A#', ['A#', 'B', 'C', 'C#', 'D', 'D#', 'E', 'F', 'F#', 'G', 'G#', 'A']],
            ['B',  ['B', 'C', 'C#', 'D', 'D#', 'E', 'F', 'F#', 'G', 'G#', 'A', 'A#']]
        ];
    }


    public function testReturnCTonalityNotesOnEmptyRootNote()
    {
        $this->assertEquals(ChordGenerator\Model\Tonality::getTonality(), ['C', 'C#', 'D', 'D#', 'E', 'F', 'F#', 'G', 'G#', 'A', 'A#', 'B']);
    }

    public function testReturnDbTonalityNotesOnEmptyRootNote()
    {
        $this->assertEquals(ChordGenerator\Model\Tonality::getTonality('Db'), ['C#', 'D', 'D#', 'E', 'F', 'F#', 'G', 'G#', 'A', 'A#', 'B', 'C']);
    }


    public function testThrowExceptionOnInvalidRootNote()
    {
        $this->expectException(\Exception::class);
        \ChordGenerator\Model\Tonality::getTonality('Z');
    }

    public function testNormalizeFlatRootNote()
    {
        $this->assertEquals(\ChordGenerator\Model\Tonality::normalize('Db'), 'C#');
    }

    public function testNormalizeReturnsSameSharpRootNote()
    {
        $this->assertEquals(\ChordGenerator\Model\Tonality::normalize('C#'), 'C#');
    }
}
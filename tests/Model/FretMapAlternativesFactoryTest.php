<?php
/**
 * Created by PhpStorm.
 * User: thiago
 * Date: 13/01/19
 * Time: 11:13
 */

class FretMapAlternativesFactoryTest extends \PHPUnit\Framework\TestCase
{
    function testCmajFretsIsInCorrectOrder() {
        $fretboard = \ChordGenerator\Model\UkuleleFretboard::FRETBOARD;
        $chordFretMapAlternatives = \ChordGenerator\Model\FretMapAlternativesFactory::create($fretboard, 4, ['C', 'E', 'G']);
        $this->assertTrue(in_array([0,0,0,3], $chordFretMapAlternatives));
    }

}
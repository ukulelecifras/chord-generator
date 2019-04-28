<?php


namespace ChordGenerator\Model;


class ChordFactory
{
    static public function create($rootNote, $name, $slugName, $symbol, $formula, $notes, $fretMaps)
    {
        return new \ChordGenerator\Model\Chord(
            $rootNote,
            "{$rootNote} {$name}",
            str_replace('#', '_sharp', strtolower($rootNote)) . "_$slugName",
            "{$rootNote}{$symbol}",
            $formula,
            $notes,
            $fretMaps
        );

    }
}
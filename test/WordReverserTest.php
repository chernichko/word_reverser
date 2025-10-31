<?php

namespace WordReverser\Test;

use PHPUnit\Framework\TestCase;
use WordReverser\WordReverser;

class WordReverserTest extends TestCase
{
    public function testWordReverser()
    {
        $reverser = new WordReverser();

        $testWords = [
            ['Cat', 'Tac'],
            ['Мышь', 'Ьшым'],
            ['houSe', 'esuOh'],
            ['домИК', 'кимОД'],
            ['elEpHant', 'tnAhPele'],
            ['cat,', 'tac,'],
            ['Зима:', 'Амиз:'],
            ["is 'cold' now", "si 'dloc' won"],
            ['это «Так» "просто"', 'отэ «Кат» "отсорп"'],
            ['third-part', 'driht-trap'],
            ['can`t', 'nac`t'],
        ];

        foreach ($testWords as [$input, $expected]) {
            $this->assertEquals($expected, $reverser->reverseWords($input));
        }
    }
}
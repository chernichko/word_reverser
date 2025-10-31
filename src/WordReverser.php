<?php
namespace WordReverser;

class WordReverser
{
    public static function reverseWords(string $text): string
    {
        if ($text === '') {
            return '';
        }

        $pattern = '/([^\p{L}]+|[\p{L}]+)/u';
        preg_match_all($pattern, $text, $matches);
        $parts = $matches[0];

        $result = '';
        foreach ($parts as $part) {
            if (preg_match('/\p{L}/u', $part)) {
                $result .= self::reverseOneWord($part);
            } else {
                $result .= $part;
            }
        }

        return $result;

    }

    private static function reverseOneWord(string $word): string
    {
        $chars = preg_split('//u', $word, -1, PREG_SPLIT_NO_EMPTY);

        // Находим позиции букв
        $letterPositions = [];
        $letters = [];

        foreach ($chars as $index => $char) {
            if (preg_match('/\p{L}/u', $char)) {
                $letterPositions[] = $index;
                $letters[] = $char;
            }
        }

        $reversedLetters = array_reverse($letters);

        $changedWord = '';

        foreach ($letterPositions as $i => $position) {

            if(mb_strtoupper($letters[$position]) == $letters[$position]) {
                $reversedLetters[$i] = mb_strtoupper($reversedLetters[$i]);
            }else{
                $reversedLetters[$i] = mb_strtolower($reversedLetters[$i]);
            }

            $changedWord .= $reversedLetters[$i];
        }

        return $changedWord;
    }

}
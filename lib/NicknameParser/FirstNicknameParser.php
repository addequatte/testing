<?php

namespace NicknameParser;

class FirstNicknameParser implements ParserInterface
{
    const REGEXP = '/(^|\s)(@[^0-9][0-9a-zA-Z]+)(\s|$)/';

    /**
     * Оборачеваем входную строку тегами <b></b>
     * @param string $string
     * @return string
     */
    private function boldWrap(string $string): string
    {
        return '<b>' . $string . '</b>';
    }

    /**
     * @param string $string
     * @return string
     */
    public function wrapNickname(string $string): string
    {
        return preg_replace_callback(self::REGEXP, function ($matches) {
            return $matches[1] . $this->boldWrap($matches[2]) . $matches[3];
        },
            $string
        );
    }
}
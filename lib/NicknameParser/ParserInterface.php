<?php

namespace NicknameParser;

interface ParserInterface
{
    /**
     * Метод для выделения никнейма из строки
     * @param string $string
     * @return string
     */
    public function wrapNickname(string $string) :string;
}
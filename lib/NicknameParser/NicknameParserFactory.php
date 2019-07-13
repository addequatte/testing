<?php

namespace NicknameParser;

class NicknameParserFactory
{
    const FIRST_TYPE = 'first';

    /**
     * Фабричный метод, возвращающий экземпляр класса по заданному типу, для выбора типа парсера
     * @param string $type
     * @return ParserInterface
     * @throws \Exception
     */
    public static function parser(string $type): ParserInterface
    {
        switch ($type) {
            case self::FIRST_TYPE:
                return new FirstNicknameParser();
        }

        throw new \Exception('Передан незнакомый тип парсера');
    }
}
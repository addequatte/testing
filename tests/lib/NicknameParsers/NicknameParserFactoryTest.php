<?php

use NicknameParser\NicknameParserFactory;
use NicknameParser\FirstNicknameParser;

class NicknameParserFactoryTest extends PHPUnit\Framework\TestCase
{

    /**
     * Тестируем, что фабрика вернет нужный нам экземляр класса
     * @return void
     */
    public function testParser()
    {
        $parser = null;

        try {
            $parser = NicknameParserFactory::parser(NicknameParserFactory::FIRST_TYPE);
        } catch (Exception $e) {
            echo $e->getMessage() . "\n";
        }

        $this->assertTrue($parser instanceof FirstNicknameParser);
    }

    /**
     * Тестируем, что метод кинет ексепшен на незнакомый тип парсера
     * @throws Exception
     */
    public function testExceptionParser()
    {
        $this->expectException(Exception::class);

        NicknameParserFactory::parser('second');
    }
}

<?php


use NicknameParser\FirstNicknameParser;
use PHPUnit\Framework\TestCase;

class FirstNicknameParserTest extends TestCase
{

    const STRING_ARRAY =
        [
            'first' => '@storm87 сообщил нам вчера о результата',
            'second' => 'Я живу в одном доме с @300spartans',
            'third' => 'Правильный ник: @anothernick | неправильный ник: @usernick;',
            'fourth' => 'Плохая строка: _@usernick;',
            'fifth' => 'Плохой ник: @bad_nick',
            'sixth' => 'Хороший ник на конце строки @goodnick',
            'seventh' => 'Более одного никнейма в строке @storm87 похож на @storm78',
        ];

    /**
     * @var FirstNicknameParser
     */
    private $firstNicknameParser;

    public function setUp(): void
    {
        parent::setUp();

        $this->firstNicknameParser = new FirstNicknameParser();
    }

    public function testFirstNickname()
    {
        $resultString = $this->firstNicknameParser->wrapNickname(self::STRING_ARRAY['first']);

        $this->assertEquals('<b>@storm87</b> сообщил нам вчера о результата', $resultString);
    }

    public function testSecondNickname()
    {
        $resultString = $this->firstNicknameParser->wrapNickname(self::STRING_ARRAY['second']);

        $this->assertEquals('Я живу в одном доме с @300spartans', $resultString);
    }

    public function testThirdNickname()
    {
        $resultString = $this->firstNicknameParser->wrapNickname(self::STRING_ARRAY['third']);

        $this->assertEquals('Правильный ник: <b>@anothernick</b> | неправильный ник: @usernick;', $resultString);
    }

    public function testFourthNickname()
    {
        $resultString = $this->firstNicknameParser->wrapNickname(self::STRING_ARRAY['fourth']);

        $this->assertEquals('Плохая строка: _@usernick;', $resultString);
    }

    public function testFifthNickname()
    {
        $resultString = $this->firstNicknameParser->wrapNickname(self::STRING_ARRAY['fifth']);

        $this->assertEquals('Плохой ник: @bad_nick', $resultString);
    }

    public function testSixthNickname()
    {
        $resultString = $this->firstNicknameParser->wrapNickname(self::STRING_ARRAY['sixth']);

        $this->assertEquals('Хороший ник на конце строки <b>@goodnick</b>', $resultString);
    }

    public function testSeventhNickname()
    {
        $resultString = $this->firstNicknameParser->wrapNickname(self::STRING_ARRAY['seventh']);

        $this->assertEquals('Более одного никнейма в строке <b>@storm87</b> похож на <b>@storm78</b>', $resultString);
    }
}

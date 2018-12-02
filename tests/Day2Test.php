<?php declare(strict_types=1);


use aoc2018\ChecksumCalculator;
use PHPUnit\Framework\TestCase;

class Day2Test extends TestCase
{
    /**
     * @var ChecksumCalculator
     */
    private $checksumCalculator;

    public function setup()
    {
        $this->checksumCalculator = new ChecksumCalculator();
    }

    /**
     * @test
     * @dataProvider boxIDsForChecksum
     */
    public function box_checksum_is_calculated(array $boxIds, int $checksum)
    {
        $resultingChecksum = $this->checksumCalculator->calculate($boxIds);

        $this->assertSame($checksum, $resultingChecksum);
    }

    /**
     * @test
     */
    public function box_checksum_is_calculated_with_actual_input()
    {
        $input = file_get_contents(__DIR__ . '/inputs/day2_1.txt');

        $boxIds = explode("\n", $input);

        $resultingChecksum = $this->checksumCalculator->calculate($boxIds);

        $this->assertSame(7105, $resultingChecksum);
    }

    /**
     * @test
     * @dataProvider boxIDsForCommonLetters
     */
    public function common_letters_are_found(array $boxIds, string $commonLetters)
    {
        $resultingCommonLetters = $this->checksumCalculator->findCommonLetters($boxIds);

        $this->assertSame($commonLetters, $resultingCommonLetters);
    }

    /**
     * @test
     */
    public function common_letters_are_found_with_actual_input()
    {
        $input = file_get_contents(__DIR__ . '/inputs/day2_1.txt');

        $boxIds = explode("\n", $input);

        $resultingCommonLetters = $this->checksumCalculator->findCommonLetters($boxIds);

        $this->assertSame('omlvgdokxfncvqyersasjziup', $resultingCommonLetters);
    }

    public function boxIDsForChecksum()
    {
        return [
            [
                [
                    'abcdef',
                    'bababc',
                    'abbcde'.
                    'abcccd',
                    'aabcdd',
                    'abcdee',
                    'ababab'
                ],
                12
            ]
        ];
    }

    public function boxIDsForCommonLetters()
    {
        return [
            [
                [
                    'abcde',
                    'fghij',
                    'klmno',
                    'pqrst',
                    'fguij',
                    'axcye',
                    'wvxyz'
                ],
                'fgij'
            ]
        ];
    }
}
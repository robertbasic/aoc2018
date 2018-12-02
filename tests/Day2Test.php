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
     * @dataProvider boxIDs
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

    public function boxIDs()
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
}
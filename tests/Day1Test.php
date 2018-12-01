<?php declare(strict_types=1);


use aoc2018\FrequencyCalculator;
use PHPUnit\Framework\TestCase;

class Day1Test extends TestCase
{
    private $frequencyCalculator;

    public function setup()
    {
        $this->frequencyCalculator = new FrequencyCalculator();
    }

    /**
     * @test
     * @dataProvider frequencies
     */
    public function resulting_frequency_is_calculated(string $frequencies, int $expectedFrequency)
    {
        $resultingFrequency = $this->frequencyCalculator->calculate($frequencies);

        $this->assertSame($expectedFrequency, $resultingFrequency);
    }

    /**
     * @test
     */
    public function resulting_frequency_is_calculated_with_actual_input()
    {
        $input = file_get_contents('./tests/inputs/day1_1.txt');

        $frequencies = str_replace("\n", ",", $input);

        $resultingFrequency = $this->frequencyCalculator->calculate($frequencies);

        $this->assertSame(411, $resultingFrequency);
    }

    public function frequencies(): array
    {
        return [
            [
                '+1, -2, +3, +1',
                3
            ],
            [
                '+1, +1, +1',
                3
            ],
            [
                '+1, +1, -2',
                0
            ],
            [
                '-1, -2, -3',
                -6
            ],
        ];
    }
}
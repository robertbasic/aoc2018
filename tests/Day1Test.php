<?php declare(strict_types=1);


use aoc2018\FrequencyCalculator;
use PHPUnit\Framework\TestCase;

class Day1Test extends TestCase
{
    /**
     * @var FrequencyCalculator
     */
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
        $input = file_get_contents(__DIR__ . '/inputs/day1_1.txt');

        $frequencies = str_replace("\n", ",", $input);

        $resultingFrequency = $this->frequencyCalculator->calculate($frequencies);

        $this->assertSame(411, $resultingFrequency);
    }

    /**
     * @test
     * @dataProvider loopingFrequencies
     */
    public function looping_frequency_is_calculated($frequencies, $expectedLoopedFrequency)
    {
        $loopedFrequency = $this->frequencyCalculator->calculateLoopedFrequency($frequencies);

        $this->assertSame($expectedLoopedFrequency, $loopedFrequency);
    }

    /**
     * @test
     */
    public function looping_frequency_is_calculated_with_actual_input()
    {
        $input = file_get_contents(__DIR__ . '/inputs/day1_1.txt');

        $frequencies = str_replace("\n", ",", rtrim($input, "\n"));

        $loopedFrequency = $this->frequencyCalculator->calculateLoopedFrequency($frequencies);

        $this->assertSame(56360, $loopedFrequency);
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

    public function loopingFrequencies(): array
    {
        return [
            [
                '+1, -2, +3, +1',
                2
            ],
            [
                '+1, -1',
                0
            ],
            [
                '+3, +3, +4, -2, -4',
                10
            ],
            [
                '-6, +3, +8, +5, -6',
                5
            ],
            [
                '+7, +7, -2, -7, -4',
                14
            ]
        ];
    }
}
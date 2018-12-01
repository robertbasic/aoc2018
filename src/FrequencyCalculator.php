<?php declare(strict_types=1);

namespace aoc2018;

class FrequencyCalculator
{
    public function calculate(string $frequencies): int
    {
        $frequencies = $this->castFrequencies($frequencies);
        return array_sum($frequencies);
    }

    private function castFrequencies(string $frequencies): array
    {
        return explode(',', $frequencies);
    }
}
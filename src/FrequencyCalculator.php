<?php declare(strict_types=1);

namespace aoc2018;

class FrequencyCalculator
{
    public function calculate(string $frequencies): int
    {
        $frequencies = $this->castFrequencies($frequencies);
        return array_sum($frequencies);
    }

    public function calculateLoopedFrequency(string $frequencies): int
    {
        $frequencies = $this->castFrequencies($frequencies);

        $currentFrequency = 0;
        $seenFrequencies = [];

        while (true) {
            foreach ($frequencies as $frequency) {
                if (!isset($seenFrequencies[$currentFrequency])) {
                    $seenFrequencies[$currentFrequency] = 1;
                } else {
                    $seenFrequencies[$currentFrequency] += 1;
                }

                if ($seenFrequencies[$currentFrequency] === 2) {
                    return $currentFrequency;
                }

                $currentFrequency += $frequency;
            }
        }
    }

    private function castFrequencies(string $frequencies): array
    {
        return array_map('trim', explode(',', $frequencies));
    }
}
<?php declare(strict_types=1);

namespace aoc2018;

class ChecksumCalculator
{
    public function calculate(array $boxIds): int
    {
        $boxIds = array_map('str_split', $boxIds);
        $frequencies = array_map('array_count_values', $boxIds);

        $twosAndThrees = array_filter(
            array_map(function($frequencies) {
                return array_unique(
                    array_filter(
                        $frequencies,
                        function ($frequency) {
                            return $frequency === 2 || $frequency === 3;
                        })
                );
            }, $frequencies),
            function ($twosAndThrees) {
                return count($twosAndThrees) > 0;
            }
        );

        $checksum = 0;
        $twos = [];
        $threes = [];
        array_walk($twosAndThrees, function ($twosAndThrees) use (&$twos, &$threes) {
            $twosAndThrees = array_count_values($twosAndThrees);
            if (isset($twosAndThrees[2])) {
                $twos[] = $twosAndThrees[2];
            }
            if (isset($twosAndThrees[3])) {
                $threes[] = $twosAndThrees[3];
            }
        });

        return count($twos) * count($threes);
    }
}
<?php
namespace Jarker\Entry\Services\Rule;

class ConsecutiveCharacterCount implements Rule
{
    const DEFAULT_MAXIMUM = 3;

    public function __construct(private readonly int $count = self::DEFAULT_MAXIMUM) {}

    public function passes(string $code): bool
    {
        $code = str_split($code);
        $consecutiveAsc = [];
        $consecutiveDesc = [];
        $previous = null;

        foreach ($code as $i) {
            if ($previous !== null && $i == $previous + 1) {
                $consecutiveDesc = [];
                $consecutiveAsc[] = $i;
                if (count($consecutiveAsc) > $this->count) {
                    return false;
                }
            } elseif ($previous !== null && $i == $previous - 1) {
                $consecutiveAsc = [];
                $consecutiveDesc[] = $i;
                if (count($consecutiveDesc) > $this->count) {
                    return false;
                }
            } else {
                $consecutiveDesc = [$i];
                $consecutiveAsc = [$i];
            }

            $previous = $i;
        }

        return true;
    }
}

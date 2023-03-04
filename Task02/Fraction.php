<?php

class Fraction
{
    private int $num;
    private int $denum;

    private function greatestCommonDivisor(int $n, int $m): int
    {
        while (true) {
            if ($n == $m) {
                return $m;
            }
            if ($n > $m) {
                $n -= $m;
            } else {
                $m -= $n;
            }
        }
    }

    public function __construct(int $num, int $denum)
    {
        try {
            if (!is_int($num)) {
                throw new Exception("!!The numerator must be of type INTEGER!!", 1);
            } elseif (!is_int($denum)) {
                throw new Exception("!!The denominator must be of type INTEGER!!", 1);
            }
            if ($denum == 0) {
                throw new Exception("!!Denominator musn't be ZERO!!", 1);
            }

            if ($num == 0) {
                $this->num = 0;
                $this->denum = 1;
                return;
            }

            if ($num < 0 and $denum < 0) {
                $this->num = -$num;
                $this->denum = -$denum;
            } elseif ($num > 0 and $denum < 0) {
                $this->num = -$num;
                $this->denum = -$denum;
            } else {
                $this->num = $num;
                $this->denum = $denum;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }

        $n = $this->num < 0 ? -$this->num : $this->num;
        $m = $this->denum < 0 ? -$this->denum : $this->denum;

        $gcd = $this->greatestCommonDivisor($n, $m);
        $this->num /= $gcd;
        $this->denum /= $gcd;
    }

    public function getNumer(): int
    {
        return $this->num;
    }

    public function getDenom(): int
    {
        return $this->denum;
    }


    public function add(Fraction $frac): Fraction
    {
        $num = $this->num * $frac->getDenom() + $this->denum * $frac->getNumer();
        $denum = $this->denum * $frac->getDenom();

        return new Fraction($num, $denum);
    }

    public function sub(Fraction $frac): Fraction
    {
        $num = $this->num * $frac->getDenom() - $this->denum * $frac->getNumer();
        $denum = $this->denum * $frac->getDenom();

        return new Fraction($num, $denum);
    }

    public function mult(Fraction $frac): Fraction
    {
        return new Fraction($this->num * $frac->getNumer(), $this->denum * $frac->getDenom());
    }

    public function div(Fraction $frac): Fraction
    {
        return new Fraction($this->num * $frac->getDenom(), $this->denum * $frac->getNumer());
    }

    public function pow(int $exp): Fraction
    {
        return new Fraction($this->num ** $exp, $this->denum ** $exp);
    }

    public function __toString(): string
    {
        if ($this->num == 0) {
            return 0 . "'";
        }

        $integer_part = (int) ($this->num / $this->denum);

        if ($integer_part == 0) {
            return $this->num . "/" . $this->denum;
        } else {
            if ($this->num % $this->denum != 0) {
                return $integer_part . "'" . abs($this->num % $this->denum) . "/" . $this->denum;
            } else {
                return $integer_part . "'";
            }
        }
    }
}
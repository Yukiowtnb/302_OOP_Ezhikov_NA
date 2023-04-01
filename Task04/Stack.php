<?php

class Stack
{
    private $top_number;
    private $stack_pull = [];

    public function __construct()
    {
        $this->top_number = 0;
        $this->stack_pull[$this->top_number] = null;
        $this->top_number = -1;
    }

    public function push(...$elem)
    {
        foreach ($elem as $new) {
            $this->stack_pull[++$this->top_number] = $new;
        }
    }

    public function pop()
    {
        if ($this->top_number < 0) {
            return null;
        } else {
            $x = $this->stack_pull[$this->top_number];
            unset($this->stack_pull[$this->top_number--]);
            return $x;
        }
    }

    public function top()
    {
        if ($this->top_number < 0) {
            return null;
        } else {
            return $this->stack_pull[$this->top_number];
        }
    }

    public function isEmpty()
    {
        if ($this->top_number == -1) {
            return true;
        } else {
            return false;
        }
    }

    public function copy()
    {
        $temp = new Stack();
        foreach ($this->stack_pull as $old) {
            $temp->push($old);
        }
        return $temp;
    }

    public function __toString()
    {
        if ($this->isEmpty()) {
            return "[]";
        } else {
            $full = "[";
            $full .= $this->stack_pull[$this->top_number];
            for ($i = 1; $i <= $this->top_number; $i++) {
                $sum = $this->stack_pull[$this->top_number - $i];
                $full = $full . "->" . $sum;
            }
            $full .= "]";
            return $full;
        }
    }

    public function size()
    {
        return $this->top_number + 1;
    }
}

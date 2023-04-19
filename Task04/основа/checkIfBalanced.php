<?php

use App\Stack;

function checkIfBalanced(string $expression)
{
    $stack = new Stack();

    $check1 = "";

    $check2 = "";

    for ($i = 0; $i < strlen($expression); $i++) {
        if ($expression[$i] == "<" ||
            $expression[$i] == "{" ||
            $expression[$i] == "[" ||
            $expression[$i] == "("
        ) {
            $stack->push($expression[$i]);
        } elseif ($expression[$i] == ">" ||
            $expression[$i] == "}" ||
            $expression[$i] == "]" ||
            $expression[$i] == ")"
        ) {
            if ($stack->isEmpty() == true) {
                return false;
            } else {
                if ($expression[$i] == ">") {
                    $check1 = "<";
                } elseif ($expression[$i] == "}") {
                    $check1 = "{";
                } elseif ($expression[$i] == "]") {
                    $check1 = "[";
                } elseif ($expression[$i] == ")") {
                    $check1 = "(";
                }

                $check2 = $stack->pop();

                if ($check1 == $check2) {
                    continue;
                } else {
                    return false;
                }
            }
        }
    }

    return true;
}

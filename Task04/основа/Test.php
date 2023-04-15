<?php

function runTest()
{
    $s1 = new Stack(2, 3, 4, 5);
    $s1_res = $s1->__toString();
    $s1_expect = "[5->4->3->2]";
    $s1_expect_push = "[8->6->5->4->3->2]";
    $s1_expect_pop = "[6->5->4->3->2]";
    $s1_expect_top = 6;

    $s1->isEmpty() . PHP_EOL;


    echo "Начальный стэк" . PHP_EOL;
    if ($s1_res === $s1_expect) {
        echo 'Проверка пройдена.' . PHP_EOL;
        echo 'Ожидание: ' . $s1_expect . ' Получено: ' . $s1_res . PHP_EOL;
    } else {
        echo 'Ожидание: ' . $s1_expect . ' Получено: ' . $s1_res . ' Не пройдена проверка' . PHP_EOL;
    }

    $s1->push(6, 8);
    $s1_res = $s1->__toString();

    echo "Push" . PHP_EOL;
    if ($s1_res === $s1_expect_push) {
        echo 'Проверка пройдена.' . PHP_EOL;
        echo 'Ожидание: ' . $s1_expect_push . ' Получено: ' . $s1_res . PHP_EOL;
    } else {
        echo 'Ожидание: ' . $s1_expect_push . ' Получено: ' . $s1_res . ' Не пройдена проверка' . PHP_EOL;
    }

    $s1->pop();
    $s1_res = $s1->__toString();

    echo "Pop" . PHP_EOL;
    if ($s1_res === $s1_expect_pop) {
        echo 'Проверка пройдена.' . PHP_EOL;
        echo 'Ожидание: ' . $s1_expect_pop . ' Получено: ' . $s1_res . PHP_EOL;
    } else {
        echo 'Ожидание: ' . $s1_expect_pop . ' Получено: ' . $s1_res . ' Не пройдена проверка' . PHP_EOL;
    }

    $s1_top = $s1->top();

    echo "Top" . PHP_EOL;
    if ($s1_top === $s1_expect_top) {
        echo 'Проверка пройдена.' . PHP_EOL;
        echo 'Ожидание: ' . $s1_expect_top . ' Получено: ' . $s1_top . PHP_EOL;
    } else {
        echo 'Ожидание: ' . $s1_expect_top . ' Получено: ' . $s1_top . ' Не пройдена проверка' . PHP_EOL;
    }


    echo "Copy" . PHP_EOL;
    $s2 = new Stack();
    $s2_str = $s2->__toString();
    $s2_res = "[]";

    if ($s2_res === $s2_str) {
        echo 'Проверка пройдена.' . PHP_EOL;
        echo 'Ожидание: ' . $s2_res . ' Получено: ' . $s2 . PHP_EOL;
    } else {
        echo 'Ожидание: ' . $s2_res . ' Получено: ' . $s2 . ' Не пройдена проверка' . PHP_EOL;
    }

    $s2_res = $s1->__toString();
    $s2 = $s1->copy();

    if ($s2_res == $s2) {
        echo 'Проверка пройдена.' . PHP_EOL;
        echo 'Ожидание: ' . $s2_res . ' Получено: ' . $s2 . PHP_EOL;
    } else {
        echo 'Ожидание: ' . $s2_res . ' Получено: ' . $s2 . ' Не пройдена проверка' . PHP_EOL;
    }

    echo "ifBalanced" . PHP_EOL;
    $str1 = "(ab[cd{}])";
    $str2 = "(ab[cd{})";
    $str3 = "(ab[cd{]})";

    echo "Ожидание: true, false, false" . PHP_EOL;
    echo "Получено: " . json_encode(checkIfBalanced($str1)) . ", " .
        json_encode(checkIfBalanced($str2)) . ", " .
        json_encode(checkIfBalanced($str3)) . PHP_EOL;

}
<?php
    /* 
    int также может быть представлен в двоичном, восьмеричном и шестнадцатиричном виде, 
    это не так часто используется на практике, но будет полезно знать, что это есть
    */
    $a = 0b11100; // двоичное число 28 в десятичной системе (на экран выведется 28)
    $b = 034; // восьмеричное число 28 в десятичной системе (на экран выведется 28)
    $c = 0x1c; // шестнадцатиричное число 28 в десятичной системе (на экран выведется 28)
    var_dump($a);
    echo "<br>";
    var_dump($b);
    echo "<br>";
    var_dump($c);
    echo "<br><br>";

    /*
    Логика двоичного числа состоит из 0 и 1, где:
    16|8|4|2|1|  - позиция
     1|1|1|0|0|  - биты

    Получается число 11100, равно 28 так как:

    1*2^4 + 1*2^3 + 1*2^2 + 0*2^1 + 0*2^0 = 16 + 8 + 4 + 0 + 0 = 28

    По такой же логике работают и другие системы счисления, но числа от 10 записываются буквами, например 10 это A
    */


    // ПЕРЕВОД ДВОИЧНОГО ЧИСЛА В ДЕСЯТИЧНОЕ
    function ex1(){
        // перевод двоичного числа в десятичное
        function binToDecConvert(string $n){
            $n = strrev($n); // разворачиваем строку
            $sum = 0; // инициализируем сумму


            for($i=0;$i<strlen($n);$i++){
                // проверка, что число двоичное
                if ($n[$i]!=0 && $n[$i]!=1){
                    throw new Exception("Ошибка, число должно быть двоичным и содержать только 0 и 1");
                }
                $sum += $n[$i] * pow(2,$i);
            }

            return $sum;
        }

        $number = "111101";
        $res = binToDecConvert(n:$number);
        echo "Двоичное число $number в десятичной системе будет $res";
    }


    // ПЕРЕВОД ДЕСЯТИЧНОГО ЧИСЛА В ДВОИЧНОЕ
    function ex2(){
        function decToBinConvert(int $n){
            if ($n === 0) return "0";

            $result = ""; // строка с будущим двоичным числом
            while($n>0){
                $result = strval($n%2).$result; // записываем остаток от деления в конец строки
                $n = intdiv($n,2); // целочисленно делим число на 2
            }
            return $result;
        }

        $number = 45;
        $res = decToBinConvert(n:$number);
        echo $res;
    }


    // УНИВЕРСАЛЬНЫЙ МЕТОД ДЛЯ ПЕРЕВОДА ДЕСЯТИЧНОГО ЧИСЛА В ДРУГИЕ СИСТЕМЫ СЧИСЛЕНИЙ ОТ 2 ДО 36
    function ex3(){
        /*
        Пример универсальной функции работающей с системами счисления от 2 до 8
        (сислемы счисления с цифрами будут приведены в ex4)
        */
        function decToOtherNumSystem($number, $devider=2, $prefix = ""){
            if ($number === 0) {
                return "0";
            }

            // система счисления корректно работает в диапазоне от 2 до 36
            if ($devider<2 || $devider>36){
                throw new Exception("Делитель системы счисления должен быть от 2 до 36, а не $devider");
            }

            $result = ""; // будущая строка с результатом
            $letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"; // для случаев когда остатки от деления больше чем 9

             while ($number>0){
                $div = $number % $devider;

                // чтобы учесть случаи где системы счисления имеют остаток больше 10, добавлен буквенный ряд и это условие
                if ($div<10){ // если остатки от деления в диапазоне от 0 до 9
                    $result = strval($div). $result;
                }else{ // если выше, то число заменяется на букву
                    $result = $letters[$div-10].$result;
                }
                
                $number = intdiv($number, $devider);
             }
             return $prefix.$result;
        }
        $num = 256;
        echo "число $num в двоичной системе счисления: ".decToOtherNumSystem(number: $num, devider: 2)."<br>";
        echo "число $num в троичной системе счисления: ".decToOtherNumSystem(number: $num, devider: 3)."<br>";
        echo "число $num в восьмеричной системе счисления: ".decToOtherNumSystem(number: $num, devider: 8)."<br>";
        echo "число $num в шестнадцатиричной системе счисления: ".decToOtherNumSystem(number: $num, devider: 16,prefix: "0x")."<br>";
    }


    // УНИВЕРСАЛЬНЫЙ МЕТОД ДЛЯ ПЕРЕВОДА ЧИСЛА В СИСТЕМЕ СЧИСЛЕНИЯ (ДЕСЯТИЧНОЙ НАПРИМЕР) В ДЕСЯТИЧНУЮ СИСТЕМУ СЧИСЛЕНИЯ
    function ex4(){
        function numSystemToDec($num,$divider=2){
            $liters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $num = strrev($num); // строку нужно развернуть для чтения слева направо
            $result = 0;
            for($i=0;$i<=strlen($num)-1;$i++){
                $cursor = $num[$i];
                if (str_contains($liters, $cursor)){
                    $cursor = strpos($liters, $cursor)+10;
                }
                $result += $cursor * pow($divider, $i); // см строки 17-23
            }
            echo $result;
        }

        numSystemToDec(num:"1C",divider:16);
    }


    // ex4();



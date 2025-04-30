<?php
    /*
    isset - возвращает true если переменная объявлена и инициализирована (то есть ей уже присвоено значение)
    empty - возвращает true если значение переменной пустое (0, "0", "", false, null, [])
    */

    // ex1(); // проверка существования (определения) переменной с помощью isset
    ex2(); // empty проверка есть ли у переменной значение или она пустышка (содержит: null, false, 0, пустую строку)

    // empty проверка есть ли у переменной значение или она пустышка (содержит: null, false, 0, пустую строку)
    function ex2(){
        // empty производит не строгое сравнение
        function isVariableEmpty($var){
            if (empty($var)){
                return "true переменная пуста<br>";
            }else{
                return "false переменная имеет значение<br>";
            }
        }

        // случаи пустых переменных (которые будут определены как пустые)
        $a = "0"; // как видно отсюда сравнение выполняется не строгое
        $b = null;
        $c = 0;
        $d = false;
        $e = [];
        $f = "";
        // не пустышка
        $g = "123"; //вот эта переменная уже не пустышка

        echo '$a '.isVariableEmpty($a); // пустышка
        echo '$b '.isVariableEmpty($b); // пустышка
        echo '$c '.isVariableEmpty($c); // пустышка
        echo '$d '.isVariableEmpty($d); // пустышка
        echo '$e '.isVariableEmpty($e); // пустышка
        echo '$f '.isVariableEmpty($f); // пустышка
        echo '$g '.isVariableEmpty($g); // не пустышка
    }

    // проверка существования (определения) переменной с помощью isset
    function ex1(){
        function isVariableExists($var){
            if (isset($var)){
                return "существует<br>";
            }else{
                return "не определена либо не существует<br>";
            }
        }


        $a = 100;
        $b;

        echo 'Переменная $a => '.isVariableExists(var: $a); // эта переменная существует это покажет isset
        echo 'Переменная $b => '.isVariableExists(var: $b); // переменная есть но не инциализирована, isset выдаст false и php выдаст предупреждение
        echo 'Переменная $c => '.isVariableExists(var: $c); // переменной не существует, isset выдаст false и php выдаст предупреждение
        
        
    }
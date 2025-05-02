<?php
    // показать массив: скомопновал всю логику вывода массива здесь для краткости кода в примерах
    function showArray($arr,$header = "Массив"){
        echo "<h3>$header</h3>";
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    };
<?php // файл черновик, для теста фрагментов кода

    include_once __DIR__ . '/../utilits/array.php'; // подключение функций из другого модуля
    
    // ex1(); // scandir посмотреть список файлов
    ex2(); // dirname - получение пути, если указывается 2 аргумент то на директорию выше (на столько директорий выше сколько указано в 2 аргументе)

    // dirname - получение пути, если указывается 2 аргумент то на директорию выше (на столько директорий выше сколько указано в 2 аргументе)
    function ex2(){
        $parentDir = dirname(__DIR__);
        $files = scandir($parentDir);
        natcasesort($files);
        showArray($files,"Файлы в директории<br>'$parentDir' :");
    }

    // scandir посмотреть список файлов
    function ex1(){
        $dir = __DIR__; // константа __DIR__ хранит путь к текущей директории (аналог os.getcwd python)
        $files = scandir($dir); // возвращает массив со списком файлов (аналог os.listdir python)
        natsort($files);
        showArray($files,"Файлы в директории<br>'$dir' :");
    }
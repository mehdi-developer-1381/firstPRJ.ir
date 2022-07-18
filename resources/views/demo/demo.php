<?php



$my_file_path=__DIR__."\\test.txt";
$users_password=[
    "reza"=>"12",
    "amin"=>"13",
    "mehdi"=>"14",
    "ali"=>"15",
];


    $open_file = fopen($my_file_path, "r+",);
        foreach ($users_password as $item) {
            fwrite($open_file, $item . "\n");
        }
    fclose($open_file);




<?php
session_start();
$path=$_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";
$query = $db -> query("SELECT `id`,`name`,`link_img`,`alt` FROM `game` ORDER BY `id` DESC ")  ;

foreach($query as $row){
    // без создания экземпляра класса создается переменная array как пустой массив
   static $array = [];
    // в массив записываем 
   $array[] = [ "id" => $row['id'],
                "name" => $row['name'],
                "link_img" => $row['link_img'],
                "alt"=> $row['alt']
                ];


}
// переводим все в json
echo json_encode($array);


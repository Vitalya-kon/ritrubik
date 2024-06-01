<?php
session_start();
$path=$_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";
// Если глобальная переменная $_POST['productid'] отсутвует , тогда выход.
if(empty($_POST['productid'])){
    exit;
}
// без создания экземпляра класса создается переменная array как пустой массив
// $array = [];
// Запрос в бд (Выбрать все из game где id=глобальная переменная $_POST['productid'] )
$query = $db -> query("SELECT * FROM game WHERE id =$_POST[productid]");
function formatDate($dateString) {
    $months = array(
        '01' => 'января',
        '02' => 'февраля',
        '03' => 'марта',
        '04' => 'апреля',
        '05' => 'мая',
        '06' => 'июня',
        '07' => 'июля',
        '08' => 'августа',
        '09' => 'сентября',
        '10' => 'октября',
        '11' => 'ноября',
        '12' => 'декабря'
    );

    $parts = explode('.', $dateString);
    $day = $parts[0];
    $month = $months[$parts[1]];
    $year = $parts[2];

    return $day . ' ' . $month . ' ' . $year . ' г.';
}
foreach($query as $row){
    // в массив записываем 
   $array_1 = [ "id" => $row['id'],
                "name" => $row['name'],
                "link_img" => $row['link_img'],
                "link_img_two" => $row['link_img-2'],
                "link_img_three" => $row['link_img-3'],
                "video" => $row['video'] . '&autoplay=1&mute=1', // добавляем '?autoplay=1' к URL
                "alt" => $row['alt'],
                "amount" => $row['amount'],
                "link_ref" => $row['link_ref'],
                "releaseGame" =>  !empty($row['releaseGame'])  ? formatDate(date('d.m.Y', $row['releaseGame'])) : '',
                "genres" => $row['genres'],
                "platform"=>$row['platform'],
                "description"=>$row['description'],
                "id_ggsel_partner"=>$row['id_ggsel_partner'],
                "id_ggsel_agent"=>$row['id_ggsel_agent'],
                ];
}
$query_fav = $db -> query("SELECT * FROM favorite WHERE fav_game_id =$_POST[productid]");
if($query_fav->rowCount() > 0){
    foreach($query_fav as $row_fav){
        $fav_game_id = $row_fav['fav_game_id'] ?? "";
        $fav_time_add = $row_fav['fav_time_add'] ?? "";
        $amount = $row_fav['amount'] ?? "";
        $fav_login = $row_fav['login'] ?? "";
        // в массив записываем 
    $array_2 = [ "fav_game_id" => $fav_game_id,
                    "fav_time_add" => $fav_time_add,
                    "fav_amount" => $amount,
                    "fav_login" => $fav_login
                    ];
    }
}

// $result = $query -> fetch(PDO::FETCH_ASSOC);
// $arr = ["id"=>$result['id'], "name"=>$result['name'],"link_img" => $row['link_img']];
$array = [];
if (isset($array_2)) {
    $array[] = array_merge($array_1, $array_2);
}else{
    $array[] = $array_1;
}

//function get_price($url)
//{
//    $context = stream_context_create([
//        'http' => [
//            'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3",
//        ],
//    ]);
//
//    $html = file_get_html($url, false, $context);
//
//    // Найти элемент на странице, содержащий цену.
//    // Замените 'price-tag' на актуальный CSS-класс или id элемента.
//    $price_element = $html->find('.product-item_price__3Jyqn', 0);
//
//    if ($price_element) {
//        return $price_element->plaintext;
//    } else {
//        return null;
//    }
//}
//
//// URL страницы, с которой вы хотите извлечь цену
//$url = 'https://ggsel.net/catalog/alan-wake-2/';
//$price = get_price($url);
//
//if ($price) {
//    $array[0]['price'] = 'Цена продукта: ' . $price;
//} else {
//    $array[0]['price'] = 'Не удалось найти информацию о цене.';
//}


// Перебор переменной query как переменная row

// переводим все в json
echo json_encode($array);

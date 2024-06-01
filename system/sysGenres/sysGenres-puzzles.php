<?php

session_start();

$res = '';
switch ($_POST['action']) {
    case 'patternPuzzles':
        $res = getData(
            $_POST['page'] ?? 1
        );
        break;
}
if (!empty($res)) {
    die(json_encode($res));
}

function getData(
    $page
){
    $path=$_SERVER['DOCUMENT_ROOT'];
    require_once "$path/system/db.php";
    $page = $page ?? 1;
    $kol = 24;  // количество записей для вывода
    $art = ($page * $kol) - $kol;
        // переменная $gameItemQuery с запросом в бд (выбрать все из game где id больше 0 сортировка по id)
        $gameItemQuery = $db->query("SELECT * FROM `game` WHERE genres LIKE '%Головоломки%' ORDER BY `id` DESC LIMIT  $kol  OFFSET $art");
        // $arrayAtrr_1 = $gameItemQuery->fetchAll(PDO::FETCH_ASSOC);
        // // переменная $numRows = Возвращает количество строк, затронутых последним SQL-запросом
        
        // перебор $gameItemQuery как $row
        $data = '';
        $platformList = '';

        
        foreach ($gameItemQuery as $rows) {
            $id = $rows["id"];
            $link_img = $rows["link_img"];
            $alt = $rows["alt"];
            $name = $rows["name"];
            $releaseGame = !empty($rows['releaseGame'])  ? date('d.m.Y', $rows['releaseGame']) : '';
            $genres = $rows['genres'];
            $platform = $rows['platform']; 
            // Разделение данных по запятой и сохранение их в массив
                $dataArray = explode(", ", $platform);

                // Функция для изменения каждого значения
                

                
                foreach ($dataArray as &$value) {
                    
                    // Изменение значений
                    if ($value === 'PC' OR $value === 'Windows') {
                        $value = '<i style="font-size:20px;margin-right:7px;" class="bi bi-windows"></i>';
                    }
                    if ($value === 'PlayStation 4' OR $value === 'PlayStation 5') {
                        $value = '<i style="font-size:20px;margin-right:7px;" class="bi bi-playstation"></i>';
                    }
                    if ($value === 'Xbox One' OR $value === 'Xbox Series X' OR $value === 'Xbox Series X/S' ) {
                        $value = '<i style="font-size:20px;margin-right:7px;" class="bi bi-xbox"></i> ';
                    }
                    if ($value === 'iOS') {
                        $value = '<i style="font-size:20px;margin-right:7px;" class="bi bi-apple"></i> ';
                    }
                    if ($value === 'Nintendo Switch') {
                        $value = '<i style="font-size:20px;margin-right:7px;" class="bi bi-nintendo-switch"></i>';
                    }
                    
                }
                $dataArray = array_unique($dataArray);
                // Объединение измененных значений массива в одну строку
                $platformList = implode(" ", $dataArray);
            $data .= '
                <div class = "content__item">             
                    <a href="/cardGame?productid= '.$id.'" class="linkCard" data-idproduct= '.$id.'>
                        <div class="image__item">
                            <img src="../img/image__games/'.$link_img.'" alt="'.$alt.'">
                        </div>
                        <div class="name__item">'.$name.'</div>
                    </a>
                    <div class="info" data-info="">
                        <div class="info__item release-content">
                            <span class="key">Дата выхода:</span>
                            <span class="value">'.$releaseGame.'</span>
                        </div>
                        <div class="info__item genres-content">
                            <span class="key">Жанры:</span>
                            <span class="value">'.$genres .'</span>
                        </div>
                        <div class="info__item platform-content">
                            <span class="key">Платформа:</span>
                            <span class="value">'.$platformList.'</span>
                        </div>
                    </div>
                </div>';
        } 
       
       //Подготовленный SQL-запрос для получения общего количества записей
    $sql = "SELECT COUNT(*) FROM `game` WHERE genres LIKE '%Головоломки%'";
    $stmt = $db->query($sql);
    foreach($stmt as $row){
        $total_num = $row['COUNT(*)'];
    }
    // Получение общего количества записей или устанавливаем значение 1, если записей нет.
    $total =  $total_num > 0 ? $total_num : '1';

    // Вычисление количества страниц для пагинации.
    $str_pag = ceil($total / $kol);
    $sum_pag = ($art + $kol);

    if ($total < $sum_pag) {
        $sum_pag = $total;
    }
    // Устанавливаем текущую страницу и последнюю страницу.
    $iCurr = $page;
    $iLastPage = $str_pag;

    // Определение левой и правой границ для пагинации.
    $iLeft = 4;
    $iRight = 18;

    // Определение левого и правого лимита для текущей страницы пагинации.
    $iLeftlimit = max(1, $iCurr - $iLeft);
    $iRightlimit = min($iLastPage, $iCurr + $iRight);

    // Инициализация строки для пагинационных ссылок.
    $pagLink = "<nav><ul class='pagination'>";

    // Добавление стрелок для навигации на предыдущую страницу, если это не первая страница.
    if ($page > 1) {
        $pagLink .= "<li><span style='cursor:pointer' class='pagination_link' id=1><i class='fa fa-angle-double-left'></i></span></li>";
        $ps = ($page - 1);
        $pagLink .= "<li><span style='cursor:pointer' class='pagination_link'  id=$ps><i class='fa fa-angle-left'></i></span></li>";
    }

    // Добавление кнопки с троеточием для быстрого перехода на 10 страниц назад.
    if (($iCurr > $iLeft) && ($iCurr != $iLeft)) {
        $pm = max($page - ($page > 10 ? 10 : 9), $iLeft);
        $pagLink .= "<li><span style='cursor:pointer' class='pagination_link'  id=$pm>...</span></li>";
    }

    // Добавление номеров страниц в пагинацию.
    for ($is = $iLeftlimit; $is <= $iRightlimit; $is++) {
        $isActive = $is == $page ? "active" : "";
        $pagLink .= "<li class='$isActive'><span style='cursor:pointer' class='pagination_link'  id=$is>$is</span></li>";
    }

    // Определение, нужна ли кнопка с троеточием для быстрого перехода на 10 страниц вперед.
    $ibuttonright = $iLastPage - $page;
    $rm = min($page + ($ibuttonright > 10 ? 10 : $ibuttonright), $iLastPage);

    if ($ibuttonright > $iRight) {
        $pagLink .= "<li><span style='cursor:pointer' class='pagination_link'  id=$rm>(...)</span></li>";
    }

    // Добавление стрелок для навигации на следующую страницу, если это не последняя страница.
    $ps = ($page + 1);

    if ($page < $str_pag) {
        $pagLink .= "<li><span style='cursor:pointer' class='pagination_link'  id=$ps><i class='fa fa-angle-right'></i></span></li>";
        $pagLink .= "<li><span style='cursor:pointer' class='pagination_link'  id=$iLastPage><i class='fa fa-angle-double-right'></i></span></li>";
    }
        
        $dataOutPag = "
                        <div class='pagination text-right'>
                          $pagLink</ul></nav>
                        </div>
                      ";
    
        $dataOut = "<div class='pagination'>
                          Всего страниц: <b style='color: #333b3f;'> $str_pag</b> <b style='color: #0283cc'>/</b> Показано: <b style='color: #333b3f;'>  $sum_pag  </b> из <b style='color: #333b3f;'>$total</b>
                    </div>";

        $output['pattern_start'] = $data;   
        $output['pag_top'] = $dataOut;   
        $output['pag_bottom'] = $dataOutPag;   

        return $output;
}

    
    
?>
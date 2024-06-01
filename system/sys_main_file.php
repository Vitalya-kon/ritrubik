<?php
class GameDataFetcher
{
    private $db;
    private $section;

    public function __construct($db,$section)
    {
        $this->section = $section;
        $this->db = $db;
    }

    private function getIconPlatform($dataArray){
        foreach ($dataArray as &$value) {
            if ($value === 'PC' OR $value === 'Windows') {
                $value = '<i style="font-size:20px;margin-right:7px;" class="bi bi-windows"></i>';
            }
            if ($value === 'PlayStation 3' OR $value === 'PlayStation 4' OR $value === 'PlayStation 5' OR $value === 'PlayStation Vita') {
                $value = '<i style="font-size:20px;margin-right:7px;" class="bi bi-playstation"></i>';
            }
            if ($value === 'Xbox One' OR $value === 'Xbox Series X' OR $value === 'Xbox Series X/S' OR $value === 'Xbox 360' ) {
                $value = '<i style="font-size:20px;margin-right:7px;" class="bi bi-xbox"></i> ';
            }
            if ($value === 'iOS') {
                $value = '<i style="font-size:20px;margin-right:7px;" class="bi bi-apple"></i> ';
            }
            if ($value === 'Nintendo Switch') {
                $value = '<i style="font-size:20px;margin-right:7px;" class="bi bi-nintendo-switch"></i>';
            }
            if ($value === 'Android') {
                $value = '<i style="font-size:20px;margin-right:7px;" class="bi bi-android2"></i>';
            }
        }
        $dataArray = array_unique($dataArray);
        return implode(" ", $dataArray);
    }
    

    public function getPatternData($page = 1)
    {
        $page = !empty($page) ? $page : 1;
        $kol = 24; // количество записей для вывода
        $art = ($page * $kol) - $kol;

        $seed = floor(time() / 86400);
        $gameItemQuery = $this->db->query("SELECT * FROM `game` WHERE  $this->section ORDER BY CASE WHEN actual = 1 THEN 0 ELSE 1 END, CASE WHEN actual = 1 THEN releaseGame END DESC, id DESC, RAND($seed) LIMIT  $kol  OFFSET $art");
        
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
            $platformList = $this->getIconPlatform($dataArray);


            $data .= '
                <div class = "content__item">             
                    <a href="/cardGame?productid= '.$id.'" class="linkCard" data-idproduct= '.$id.'>
                        <div class="image__item">
                            <img width="250px" height="150px" src="../img/image__games/'.$link_img.'" alt="'.$alt.'">
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
                        <div class="cardGame_cont_link_and_favorite" style="margin-bottom: 20px;margin-top:0;">
                        <a href="/cardGame?productid= '.$id.'#buy__cardGame" class="button_play" style="flex-grow: 1;margin: 0 10px;"">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                                <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                                <g id="SVGRepo_iconCarrier">
                                <path fill="none" d="M12.75 6V3.75H11.25V6L9 6C6.10051 6 3.75 8.3505 3.75 11.25V17.909C3.75 19.2019 4.7981 20.25 6.09099 20.25C6.71186 20.25 7.3073 20.0034 7.74632 19.5643L10.8107 16.5H13.1893L16.2537 19.5643C16.6927 20.0034 17.2881 20.25 17.909 20.25C19.2019 20.25 20.25 19.2019 20.25 17.909V11.25C20.25 8.3505 17.8995 6 15 6L12.75 6ZM18.75 11.25C18.75 9.17893 17.0711 7.5 15 7.5L9 7.5C6.92893 7.5 5.25 9.17893 5.25 11.25V17.909C5.25 18.3735 5.62652 18.75 6.09099 18.75C6.31403 18.75 6.52794 18.6614 6.68566 18.5037L10.1893 15H13.8107L17.3143 18.5037C17.4721 18.6614 17.686 18.75 17.909 18.75C18.3735 18.75 18.75 18.3735 18.75 17.909V11.25ZM6.75 12.75V11.25H8.25V9.75H9.75V11.25H11.25V12.75H9.75V14.25H8.25V12.75H6.75ZM15 10.875C15 11.4963 14.4963 12 13.875 12C13.2537 12 12.75 11.4963 12.75 10.875C12.75 10.2537 13.2537 9.75 13.875 9.75C14.4963 9.75 15 10.2537 15 10.875ZM16.125 14.25C16.7463 14.25 17.25 13.7463 17.25 13.125C17.25 12.5037 16.7463 12 16.125 12C15.5037 12 15 12.5037 15 13.125C15 13.7463 15.5037 14.25 16.125 14.25Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                </g>
                            </svg>
                            <span>ИГРАТЬ</span>
                        </a>
                    </div>
                    </div>
                </div>';
        }
       
        $total_num = $this->getTotalNum();
        $total = $total_num > 0 ? $total_num : '1';
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

    private function getTotalNum()
    {
        $sql = "SELECT COUNT(*) FROM `game` WHERE  $this->section";
        $stmt = $this->db->query($sql);
        foreach ($stmt as $row) {
            return $row['COUNT(*)'];
        }
        return 0;
    }
}

?>
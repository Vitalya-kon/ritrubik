<?php

session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";
require_once "$path/system/sys_main_file.php";
$gameDataFetcher = new GameDataFetcher($db, 'genres LIKE "%Адвенчура%" OR genres LIKE "%Приключения%"');

$res = '';
switch ($_POST['action']) {
    case 'patternAdventures':
        $res = $gameDataFetcher->getPatternData($_POST['page'] ?? 1);
       
        break;
}
if (!empty($res)) {
    die(json_encode($res));
}

?>
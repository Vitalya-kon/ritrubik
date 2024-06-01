<?
$path = $_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";

$res = '';
switch ($_POST['action']) {
    case 'getFooter':
        $res = getFooter($db);
       
        break;
}
if (!empty($res)) {
    die(json_encode($res));
}

function getFooter($db){
    class Footer{
        protected $db;
    
        public function __construct($db){
            $this->db = $db;
        }
    
        private function setCountGames(){
            $sql = "SELECT COUNT(id) as count FROM `game`";
            $stmt = $this->db->query($sql);
            foreach ($stmt as $row) {
                return $row['count'];
            }
            return 0;
        }
    
        public function getCountGames(){
            return $this->setCountGames();
        }
    }
    
    $footerObj = new Footer($db);
    $countGames = $footerObj->getCountGames();

    $output['count_games'] = $countGames;

    return $output;
}

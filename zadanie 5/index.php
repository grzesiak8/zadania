<?php
include_once 'config.php';

echo '<!DOCTYPE html>
<html><head>
<meta charset="UTF-8">
<title>Zadanie 5</title>
<style>
.root {
	list-style-type: decimal;
}
.poziom1 {
	list-style-type: disc;
	padding-left: 25px;
}
.poziom2 {
	list-style-type: circle;
	padding-left: 50px;
}
</style>
</head><body><div id="menu">';
try
   {
      $pdo = new PDO(MYSQL_DSN, USER, PASS);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  $pdo->exec("set names utf8");
      $menu = array();
      $stmt = $pdo->query('SELECT * FROM menu');
      foreach($stmt as $row)
      {
		  $menu = dodaj_do_menu($menu, $row);
      }
      $stmt->closeCursor(); 
   }
   catch(PDOException $e)
   {
      echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
   }
echo '</div></body></html>';

function dodaj_do_menu($menu, $item, $level = null)
{
	if(empty($item['parent_id'])) {
		$menu[] = array(
			'item' => $item,
			'items' => array()
	    );
		echo '<li class="root">'.$item['name'].'</li>';
	} else {
			foreach($menu as $key => $oneLine) {
					if($oneLine['item']['id'] == $item['parent_id']) {
						$menu[$key]['items'][] = array(
							'item' => $item,
							'items' => array()
						);
						if($level === null) {
							echo '<li class="poziom1">'.$item['name'].'</li>';
						} else {
							echo '<li class="'.$level.'">'.$item['name'].'</li>';
						}
					} elseif(!empty($oneLine['items'])) {
						$menu[$key]['items'] = dodaj_do_menu($oneLine['items'], $item, 'poziom2');
					}
			}
	}
	return $menu;
}
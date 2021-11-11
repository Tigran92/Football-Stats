<?php
require( 'includes/connect.php');
include ('templates/navigation.html');
include ('templates/header.html');

if (!isset($_GET['page'])) {
    $page_id = 'home'; 
} else {
    $page_id = $_GET['page'];
}
switch ($page_id) {
case 'home' :
    include 'views/home.php';
    break;
case 'players' :
    include 'views/players.php';
    break;
case 'teams' :
    include 'views/teams.php';
    break;
case 'grounds' :
    include 'views/grounds.php';
    break;
case 'fullinfo' :
    include 'views/fullinfos.php';
    break;
case 'add_player' :
    include 'views/add_player.php';
    break;
case 'player' :
    include 'views/player.php';
    break;



default :
    include 'views/404.php';
}
$connection->close();
?>

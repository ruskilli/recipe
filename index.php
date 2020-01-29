<?php
@include_once "libs/debug.php";
@include_once "libs/json.php";
@include_once "libs/parser.php";
@include_once "libs/db.php";

//Move config to config.php
@include_once "config.php";

$styles = array("food");
$style = (isset($_GET["text"]) && in_array($_GET["text"], $types)) ?
	$_GET['text'] :
        ((isset($_POST["text"]) && in_array($_POST["text"], $types)) ?
        $_POST['text'] :
        "food");


$id = $_GET['id'];

if(isset($id)) {
  $result = get_id($id);
} else {
  unset($id);
}

$result = $result ? $result : get_result($style, "html");

echo $result;

if(!isset($id)) {
  $id = store($result);
}

echo "<a href='?id=$id'>Del</a>";

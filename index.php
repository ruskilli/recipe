<?php
@include_once "libs/debug.php";
@include_once "libs/json.php";
@include_once "libs/parser.php";

//Move config to config.php
@include_once "config.php";

$styles = array("food");
$style = (isset($_GET["text"]) && in_array($_GET["text"], $types)) ?
	$_GET['text'] :
        ((isset($_POST["text"]) && in_array($_POST["text"], $types)) ?
        $_POST['text'] :
        "food");

$result = get_result($style, "html");

echo $result;

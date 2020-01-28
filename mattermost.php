<?php
@include_once "libs/debug.php";
@include_once "libs/json.php";
@include_once "libs/parser.php";

//Move config to config.php
@include_once "config.php";

if(!isset($_GET['token']) || strcmp($_GET['token'],$GLOBALS['api_token']) !== 0) {
  if(!isset($_POST['token']) || strcmp($_POST['token'],$GLOBALS['api_token']) !== 0) {
    echo "Neig";
    exit();
  }
}

$styles = array("food");
$style = (isset($_GET["text"]) && in_array($_GET["text"], $types)) ?
	$_GET['text'] :
        ((isset($_POST["text"]) && in_array($_POST["text"], $types)) ?
        $_POST['text'] :
        "food");

$username = isset($_GET['user_name']) ? $_GET['user_name'] :
        (isset($_POST['user_name']) ? $_POST['user_name'] : "Unknown");

$response = array(
  response_type => "ephemeral",
  username      => "Dagens oppskrift",
  icon_url      => "https://skillingstad.no/generator.png",
);

$result = get_result($style, "markdown");
$response['text'] = $result ? $result : "Det oppstod en feil";
$response['response_type'] = $result ? "in_channel" : "ephemeral";

header('Content-Type: application/json');
echo json_encode($response);


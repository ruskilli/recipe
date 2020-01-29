<?php
@include_once "libs/include.php";

if(!isset($_GET['token']) || strcmp($_GET['token'],$GLOBALS['api_token']) !== 0) {
  if(!isset($_POST['token']) || strcmp($_POST['token'],$GLOBALS['api_token']) !== 0) {
    echo "Neig";
    exit();
  }
}

$style = get_style();

$username = isset($_GET['user_name']) ? $_GET['user_name'] :
        (isset($_POST['user_name']) ? $_POST['user_name'] : "Unknown");

$response = array(
  "response_type" => "ephemeral",
  "username"      => "Dagens oppskrift",
  "icon_url"      => "https://skillingstad.no/generator.png",
);

$result = get_result($style, "markdown");
$response['text'] = $result ? $result : "Det oppstod en feil";
$response['response_type'] = $result ? "in_channel" : "ephemeral";

header('Content-Type: application/json');
echo json_encode($response);


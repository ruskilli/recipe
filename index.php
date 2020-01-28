<?php
@include_once "libs/debug.php";
@include_once "libs/json.php";

$GLOBALS["debug"] = true;

$styles = array("food");
$style = (isset($_GET["text"]) && in_array($_GET["text"], $types)) ?
	$_GET['text'] :
        ((isset($_POST["text"]) && in_array($_POST["text"], $types)) ?
        $_POST['text'] :
        "food");

if(file_exists("styles/".$style.".json")) {
  $data = json_decode(file_get_contents("styles/".$style.".json"),true);
  check_json();
} else {
  echo "No such recipe style for $style";
  exit();
}

$template = json_decode(file_get_contents("styles/template.json"),true);
check_json();

$result = "";

if($data && isset($data["count"]["recipes"])) {
  for($i = 0; $i < $data["count"]["recipes"]; $i++) {
    for($o = 0; $o < sizeof($template["order"]); $o++) {
      for($c = 0; $c < $data["count"][$template["order"][$o]]; $c++) {
         $result .= $data["style"][$template["order"][$o]]["pre"];
         for($p = 0; $p < sizeof($template["parts"][$template["order"][$o]]); $p++) {
              $rnd = array_rand($data[$template["order"][$o]][$template["parts"][$template["order"][$o]][$p]]);
              $result .= $data[$template["order"][$o]][$template["parts"][$template["order"][$o]][$p]][$rnd];
              $result .= $data["style"][$template["order"][$o]]["each"];
         }
         $result .= $data["style"][$template["order"][$o]]["post"] . "\n";
      }
    }
  }
}  

echo $result;

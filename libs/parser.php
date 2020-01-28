<?php

function get_result($style, $format) {
  if(file_exists("styles/".$style.".json")) {
    $data = json_decode(file_get_contents("styles/".$style.".json"),true);
    check_json();
  } else {
    debug("No such recipe style for $style");
    return;
  }

  $template = json_decode(file_get_contents("styles/template.json"),true);
  check_json();

  $result = "";

  if($data && isset($data["count"]["recipes"])) {
    for($r = 0; $r < $data["count"]["recipes"]; $r++) {
      for($o = 0; $o < sizeof($template["order"]); $o++) {
	$count = rand($data["count"][$template["order"][$o]][0],$data["count"][$template["order"][$o]][1]);
        for($c = 0; $c < $count; $c++) {
           $result .= $data["style"][$format][$template["order"][$o]]["pre"];
           for($p = 0; $p < sizeof($template["parts"][$template["order"][$o]]); $p++) {
              $rnd = array_rand($data[$template["order"][$o]][$template["parts"][$template["order"][$o]][$p]]);
              $result .= $data[$template["order"][$o]][$template["parts"][$template["order"][$o]][$p]][$rnd];
              $result .= $data["style"][$format][$template["order"][$o]]["each"];
           }
           $result .= $data["style"][$format][$template["order"][$o]]["post"] . "\n";
        }
      }
    }
  }  
  return $result;
}

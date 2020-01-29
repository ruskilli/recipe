<?php

function get_result($style, $format) {
  if(file_exists("styles/".$style.".json")) {
    $data = json_decode(file_get_contents("styles/".$style.".json"),true);
    check_json();
  } else {
    debug("No such recipe style for $style");
    return;
  }

  $result = "";
  if($data && isset($data["template"]["count"]["recipes"])) {
    // number of recipes to generate
    for($r = 0; $r < $data["template"]["count"]["recipes"]; $r++) {
      // Use template order 
      for($o = 0; $o < sizeof($data["template"]["order"]); $o++) {
	// Each part might have a random to:from in template
	$count = rand($data["template"]["count"][$data["template"]["order"][$o]][0],
	              $data["template"]["count"][$data["template"]["order"][$o]][1]);
        for($c = 0; $c < $count; $c++) {
	  // Prepend style for given part
           $result .= $data["template"]["style"][$format][$data["template"]["order"][$o]]["pre"];
	   // Loop subparts
	   for($p = 0; $p < sizeof($data["template"]["parts"][$data["template"]["order"][$o]]); $p++) {
	      // Randomize item from array
              $rnd = array_rand($data[$data["template"]["order"][$o]][$data["template"]["parts"][$data["template"]["order"][$o]][$p]]);
	      // Append result
 	      $result .= $data[$data["template"]["order"][$o]][$data["template"]["parts"][$data["template"]["order"][$o]][$p]][$rnd];
	      // Append style for each subpart
              $result .= $data["template"]["style"][$format][$data["template"]["order"][$o]]["each"];
           }
	   // Append post style for given part
           $result .= $data["template"]["style"][$format][$data["template"]["order"][$o]]["post"] . "\n";
        }
      }
    }
  }  
  return $result;
}

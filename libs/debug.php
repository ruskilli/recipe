<?php

function debug($msg) {
  if($GLOBALS["debug"] === true) {
    echo "<pre>\n";
    print_r($msg);
    echo "\n</pre>\n";
  }
}

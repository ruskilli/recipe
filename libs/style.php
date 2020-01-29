<?php

function get_style() {
  if (isset($_GET["text"]) && in_array($_GET["text"], $GLOBALS['enabled_styles'])) {
    return $_GET['text'];
  } else if (isset($_POST["text"]) && in_array($_POST["text"], $GLOBALS['enabled_styles'])) {
    return $_POST['text'];
  }
  return "food";
}


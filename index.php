<?php
@include_once "libs/include.php";

$style = get_style();

if(isset($_GET['id']) && $_GET['id']) {
  $id = $_GET['id'];
  $result = get_id($id);
} else {
  unset($id);
}

$result = isset($result) ? $result : get_result($style, "html");

// TODO: Make some nice HTML 

echo $result;

if(!isset($id)) {
  $id = store($result);
}

echo "<a href='?id=$id'>Del</a> <a href='?id'>Ny</a>";

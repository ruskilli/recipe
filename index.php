<?php
@include_once "libs/include.php";

$style = get_style();
$id    = $_GET['id'];

if(isset($id)) {
  $result = get_id($id);
} else {
  unset($id);
}

$result = $result ? $result : get_result($style, "html");

// TODO: Make some nice HTML 

echo $result;

if(!isset($id)) {
  $id = store($result);
}

echo "<a href='?id=$id'>Del</a> <a href=''>Ny</a>";

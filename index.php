<?php
@include_once "libs/include.php";

@require "addons/dwoo-1.3.7/vendor/autoload.php";

$style = get_style();

if(isset($_GET['id']) && $_GET['id']) {
  $id = $_GET['id'];
  $result = get_id($id);
} else {
  unset($id);
}

$result = isset($result) ? $result : get_result($style, "html");

if(!isset($id)) {
  $id = store($result);
}

$dwoo_core = new Dwoo\Core();
$dwoo_core->setCompileDir($GLOBALS['dwoo_compile_dir']);

$dwoo_tpl  = new Dwoo\Template\File("templates/html/". $style . ".tpl");
$dwoo_data = new Dwoo\Data();

$dwoo_data->assign('result', $result);
$dwoo_data->assign('id'    , $id);

echo $dwoo_core->get($dwoo_tpl, $dwoo_data);


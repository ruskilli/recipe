<?php
// 
// To use (on Ubuntu)
// sudo apt install php-sqlite3
// sudo phpenmod pdo_sqlite
// sudo apache2ctl graceful
//
// Remove $GLOBALS['sqlite_path'] from config.php to disable
// 

function store($result) {
  if(!isset($GLOBALS['sqlite_path'])) {
    return;
  }
  $db = connect_database();
  $id = new_id($db);
  $prepare = "INSERT INTO results VALUES(:id, :result)";
  $statement = $db->prepare($prepare);
  $statement->execute(["id" => $id, "result" => $result]);
  return $id;
}

function connect_database() {
   $db = new PDO("sqlite:". $GLOBALS['sqlite_path']);
   $db->setAttribute(PDO::ATTR_ERRMODE, 
                     PDO::ERRMODE_EXCEPTION);
   $db->exec("CREATE TABLE IF NOT EXISTS results (id VARCHAR(32), result TEXT)");
   return $db;
}

function new_id($db) {
  $id = (preg_split("/\./",uniqid()))[0];
  while(!check_id($id, $db)) {
    $id = new_id($db);
  }
  return $id;
}

function check_id($id, $db) {
  $prepare = "SELECT id FROM results WHERE id = :id";
  $statement = $db->prepare($prepare);
  $statement->execute(["id" => $id]);

  return ($result = $statement->fetch(PDO::FETCH_ASSOC)) ? false : true;
}

function get_id($id) {
  $db = connect_database();
  $prepare = "SELECT result FROM results WHERE id = :id";
  $statement = $db->prepare($prepare);
  $statement->execute(["id" => $id]);
  if($result = $statement->fetch(PDO::FETCH_ASSOC)) {
    return $result['result'];
  }
  return;
}
  

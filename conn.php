<?php
$username="root";
$password="M@*chlml2001";
try{
$database=new PDO("mysql:host=localhost;dbname=web_db",$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}
//check connection
catch(PDOException $e){
    echo 'erreur de connection: '. $e->getMessage();
}

?>
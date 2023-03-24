<?php
//header("Content-Type: text/csv; charset=utf-8");
//header("Content-Disposition: attachment; filename=export.csv");
$username="root";
$password="M@*chlml2001";
try{
$database=new PDO("mysql:host=localhost;dbname=web_db",$username,$password,
[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}
catch(PDOException $e){
    echo 'erreur de connection: '. $e->getMessage();
}
//exportation des données
$req=$database->prepare("SELECT * FROM composants");
$req->execute();
$data=$req->fetchAll();
$dataa=array();
//print_r($data);




?><?php
foreach($data as $d   ){
    $dataa[]=array(
            'id'=>$d->id,
            'Nom'=>$d->Nom,
            'Photo'=>$d->Photo,
            'Date_achat'=>$d->Date_achat,
            'Qte'=>$d->Qte,
            'Etat'=>$d->Etat
    );
    
    
}
require 'class.csv.php';
CSV::export($dataa,'CRUD');
?>


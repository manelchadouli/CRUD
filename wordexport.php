<?php
//  include 'conn.php';
//  if(ISSET($_POST['save'])){
//   if(!empty($_POST['table']) ){ 
//    $output ="
//     <table>".$_POST['table']."</table>
    
//    ";
   
//    $date = date("Y-m-d");
   
//    header("Content-Type: application/vnd.msword");
//    header("Expires: 0");//no-cache
//    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");//no-cache
//    header("content-disposition: attachment;filename=".$date.".doc");
   
//    echo "<html>";
//    echo $output;
//    echo "</html>";
   
//   }
//  };

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
$req=$database->prepare("SELECT * FROM compoetud");
$req->execute();
$data=$req->fetchAll();
$dataa=array();
//print_r($data);




?><?php
foreach($data as $d   ){
    $dataa[]=array(
            
            'nom'=>$d->nom,
            'composant'=>$d->composant,
           
            'qte'=>$d->qte,
            
    );
    
    
}
require 'classw.doc.php';
CSV::export($dataa,'CRUD');

?>
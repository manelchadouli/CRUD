<?php 
$username="root";
$password="M@*chlml2001";
try{
$database=new PDO("mysql:host=localhost;dbname=web_db",$username,$password,
[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
}
catch(PDOException $e){
    echo 'erreur de connection: '. $e->getMessage();
}
//send the id 
 echo $id=$_GET['id'];
//delete the row from database
$sql="DELETE FROM composants WHERE id=:id";
$statement=$database->prepare($sql);
$statement->execute([':id'=>$id]);
//redirect to main.php
header("Location:main.php");

//supprimer un composant 

  //  $id = $_GET['id'];
   // $supprimerComposant = $database->prepare("DELETE FROM composants WHERE id = ?");
   // $supprimerComposant->bindParam(':id', $id);
    //$supprimerComposant->execute([$id]);

    
   // header('Location: main.php')

  

?>








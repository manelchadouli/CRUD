<?php 
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

  
//if (isset($_POST['Nom']) && isset($_POST['Etat']) && isset($_POST['Date_achat']) && isset($_POST['Qte'])) {
   // if(!empty($_POST['Nom']) && !empty($_POST['Etat']) && !empty($_POST['Date_achat']) && !empty($_POST['Qte'])){
    $Nom = $_POST['Nom'];
    $Etat = $_POST['Etat'];
    $Date_achat = $_POST['Date_achat'];
    $Qte = $_POST['Qte'];
    $Photo = $_FILES['Photo']['name'];
    $destination = 'uploaded_img/'.$Photo;
    $PhotoPath = pathinfo($destination,PATHINFO_EXTENSION);

    move_uploaded_file($_FILES['Photo']['tmp_name'],$destination);


    //$insertionComposant=$database->prepare("INSERT INTO composants ('Nom','Photo','Date_achat','Qte','Etat') VALUES ('?','?','?','?','?')");
    //$insertionComposant->execute($_POST['Nom'],$_FILES['Photo']['name'],$_POST['Date_achat'],$_POST['Qte'],$_POST['Etat']);
     
    $inserctionComposant = $database->prepare("INSERT INTO composants (Nom, Photo, Date_achat, Qte, Etat) VALUES (:Nom, :Photo, :Date_achat, :Qte, :Etat)"); 
    $inserctionComposant->bindParam(':Nom', $Nom); 
    $inserctionComposant->bindParam(':Photo', $destination); 
    $inserctionComposant->bindParam(':Date_achat', $Date_achat); 
    $inserctionComposant->bindParam(':Qte', $Qte); 
    $inserctionComposant->bindParam(':Etat', $Etat); 
    $inserctionComposant->execute();

    header('Location: main.php');

   // }else{
     // echo 'attention tous les champs sont obligatoires';
   // }
    
//}


?>


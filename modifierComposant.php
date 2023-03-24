<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<style>
    /*add css to the html file*/
    .modal-fade{
        background-color: rgba(0,0,0,0.5);
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .modal-dialog{
        width: 500px;
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        position: relative;
    }
    .modal-header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
    }
    .modal-title{
        font-size: 20px;
        font-weight: 600;
    }
    .modal-body{
        padding: 20px 0;
    }
    .modal-footer{
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #ccc;
        padding-top: 10px;
    }
    .modal-footer button{
        padding: 5px 20px;
        border: none;
        background-color: #007bff;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
    }
    .modal-footer button:hover{
        background-color: #0069d9;
    }
    .modal-footer button:focus{
        outline: none;
    }
    .modal-footer button:active{
        background-color: #0062cc;
    }
    .modal-footer a{
        padding: 5px 20px;
        border: none;
        background-color: #007bff;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }
    .modal-footer a:hover{
        background-color: #0069d9;
    }
    .modal-footer a:focus{
        outline: none;
    }
    .modal-footer a:active{
        background-color: #0062cc;
    }
    .modal-footer .close{
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
    }
    .modal-footer .close:hover{
        color: #000;
    }
    .modal-footer .close:focus{
        outline: none;
    }
    .modal-footer .close:active{
        color: #000;
    }
    .modal-footer .close:before{
        content: "\00d7";
    }
    .modal-footer .close:hover:before{
        content: "\00d7";
    }
    .modal-footer .close:focus:before{
        content: "\00d7";
    }
    .modal-footer .close:active:before{
        content: "\00d7";
    }
    /*add css to input*/
    .v-49{
        display: flex;
        flex-direction: column;
        margin-bottom: 10px;
    }
    .v-49 label{
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 5px;
    }
    .v-49 input{
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
    }
    .v-49 input:focus{
        border: 1px solid #007bff;
    }
    .v-49 input:active{
        border: 1px solid #0062cc;
    }
   
    /*add css to etat*/
    .v-48{
        display: flex;
        flex-direction: column;
        margin-bottom: 10px;
    }
    .v-48 label{
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 5px;
    }
    .v-48 select{
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
    }
    .v-48 select:focus{
        border: 1px solid #007bff;
    }
    .v-48 select:active{
        border: 1px solid #0062cc;
    }
    /*add css to date_achat*/
    .v-47{
        display: flex;
        flex-direction: column;
        margin-bottom: 10px;
    }
    .v-47 label{
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 5px;
    }
    .v-47 input{
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
    }
    .v-47 input:focus{
        border: 1px solid #007bff;
    }
    .v-47 input:active{
        border: 1px solid #0062cc;
    }
    /*add css to qte*/
    .v-46{
        display: flex;
        flex-direction: column;
        margin-bottom: 10px;
    }
    .v-46 label{
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 5px;
    }
    .v-46 input{
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
    }
    .v-46 input:focus{
        border: 1px solid #007bff;
    }
    .v-46 input:active{
        border: 1px solid #0062cc;
    }
    /*add css to photo*/
    .v-45{
        display: flex;
        flex-direction: column;
        margin-bottom: 10px;
    }
    .v-45 label{
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 5px;
    }
    .v-45 input{
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
    }
    .v-45 input:focus{
        border: 1px solid #007bff;
    }
    .v-45 input:active{
        border: 1px solid #0062cc;
    }
    /*make button annuler next to button ajouter*/
    

</style>

<body>
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

//update the row from database
$id=$_GET['id'];
if(isset($_GET['id'])){
    $getCompo=$database->prepare("SELECT * FROM composants WHERE id=:id");
    $getCompo->bindParam(':id',$_GET['id']);
    $getCompo->execute();
    foreach($getCompo as $compo){
       echo' <div class="modal-fade" id="createModal" >
             <div class="modal-dialog">
             <div class="modal-content">
             <div class="modal-header">
             <h1 class="modal-title" id="createModalLabel">Modifier Composant</h1>
          
             </div>
             <div class="modal-body">
             <form  method="post" enctype="multipart/form-data" id="formOrdere">
                                       <div class="v-49">
                                       <label for="Nom">Nom</label>
                                       <input type="text" name="Nom" id="Nom" class="form-control" value="'.$compo->Nom.'"  >
                                   </div>
                                       <div class="v-48">
                                           <div class="form-floating">
                                           <label for="Etat">Etat</label>
                                           <select class="form-select" id="Etat" aria-label="Etat" name="Etat"   >
                                              <option value="'.$compo->Etat.'" selected disabled hidden >'.$compo->Etat.'</option>
                                              <option value="disponible" name="disponible">disponible</option>
                                              <option value="en stock" name="en stock">en stock</option>
                                              <option value="perdu" name="perdu">perdu</option>
                                           </select>
                                           
                                           </div>
                                       </div>
                                       <div class="v-47">
                                           <div class="form-floating">
                                           <label for="Date_achat">Date_achat</label>
                                           <input type="date" class="form-control" id="Date_achat" name="Date_achat" required value="'.$compo->Date_achat.'">
                                           
                                           </div>
                                       </div>
                                       <div class="v-46">
                                           <div class="form-floating">
                                           <label for="Qte">Qte</label>
                                           <input type="number" class="form-control" id="Qte" name="Qte" value="'.$compo->Qte.'"  >
                                         
                                           </div>
                                       </div>
                                       <div class="v-45">
                                           <div class="form-floating">
                                               <label for="Photo">upload image</label>
                                               <input type="file" id="Photo" name="Photo"   ><img src="'.$compo->Photo.'" width="200px" height="70px">
                                              
                                           </div>
                                       </div>
                                  
                                       <div class="modal-footer">
                                            <a  class="btn btn-primary"  role="button" href="/CRUD/main.php">retour</a>
                                          
                                             &nbsp;&nbsp;&nbsp;
                                             <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal" name="modifier" >modifier</button>
                                       </div>
                                   </form>
       
                                   </div>
                                   </div>
                               </div>
                             </div>
                             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
';}}

if(isset($_POST['modifier'])){
    $Nom = $_POST['Nom'];
    $Etat = $_POST['Etat'];
    $Date_achat = $_POST['Date_achat'];
    $Qte = $_POST['Qte'];
    $Photo = $_FILES['Photo']['name'];
    $destination = 'uploaded_img/'.$Photo;
    $PhotoPath = pathinfo($destination,PATHINFO_EXTENSION);

    move_uploaded_file($_FILES['Photo']['tmp_name'],$destination);
    $update= $database->prepare("UPDATE composants SET Nom=:Nom, Photo=:Photo, Date_achat=:Date_achat, Qte=:Qte, Etat=:Etat WHERE id=:id");
    $update->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
    $update->bindValue(':Nom',$_POST['Nom'],PDO::PARAM_STR);
    $update->bindValue(':Photo',$destination,PDO::PARAM_STR);
    $update->bindValue(':Date_achat',$_POST['Date_achat'],PDO::PARAM_STR);
    $update->bindValue(':Qte',$_POST['Qte'],PDO::PARAM_INT);
    $update->bindValue(':Etat',$_POST['Etat'],PDO::PARAM_STR);
    $update->execute();

 
}
?>

    </body>

</html>

<?php
//create connection
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

if(isset($_POST['request'])){

   $request=$_POST['request'];
   $req=$database->prepare("SELECT * FROM composants WHERE Etat like '%{$request}%'or Date_achat like '%{$request}%' ");
   $req->execute();
   $results=$req->fetchAll();


?>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Photo</th>
      <th scope="col">Date_achat</th>
      <th scope="col">Qte</th>
      <th scope="col">Etat</th>
      <th scope="col"></th>
    
    </tr>
  </thead>
  <tbody>
  <?php
  if($req->rowCount()>0){
      foreach($results as $d){
        
              echo'<tr>
              <th scope="row">'.$d->id.'</th>
              <td>'.$d->Nom.'</td>
              <td><img src='.$d->Photo.' width ="200px" height ="70px"></td>
              <td>'.$d->Date_achat.'</td>
              <td>'.$d->Qte.'</td>
              <td>'.$d->Etat.'</td>
              
              <td>
              <a href="/CRUD/modifierComposant.php?  id='.$d->id.'" class="text-primary me-2 editBtn "title="modifier"><i class="fas fa-edit"></i></a>
              </td>
              <td>
              <a href="/CRUD/supprimerComposant.php? id='.$d->id.'" class="text-danger me-2 deleteBtn " title="supprimer"   ><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>';
          }
      }
      
      ?>
          
  </tbody>
</table>
        </div>
    </div>

        <?php
      }


?>

     
     

  
   
   

























  
  
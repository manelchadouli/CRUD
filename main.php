
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
    <title>Document</title>
</head>
<style>
  <?php include 'style.css'; ?>
</style>
<body>
  <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"> <img src="logoarduinoweb.png" alt="" width="50px" height="50px"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/CRUD/home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/CRUD/main.php">Liste des composants</a>
              </li>
              <li class="nav-item">
              <!--add a search bar-->
              <form class="d-flex"  method="POST"  >
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" id="search" >
                <button class="btn btn-outline-success" name="search" >Search</button>
              </form>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/CRUD/welcome.html" role="button" id="logout">déconnecter</a>
              </li>
              </ul>
              
              
          </div>
        </div>
    </nav>  
<section class="container py-5">
    <div class="row">
      <div class="col-lg-8.col-sm.mb-5 mx-auto"></div>
      <h1 class="fs-4 text-center lead text-primary">CRUD PHP MYSQL AJAX</h1>
    </div>
    <div class="dropdown-devider border-warning"></div>
    <div class="row">
      <div class="col-md-6">
        <h5 class="fw-bold mb-0">Liste des composants</h5>
      </div>
      <div class="col-md-6">
        <div class="d-flex justify-content-end">
            <a class="btn btn-primary btn-sm me-3 " role="button" href="/CRUD/ajouterComposant.html" ><i class="fas fa-folder-plus"></i>Nouveau</a>
          
            <a  class="btn btn-success btn-sm"  role="button" href="/CRUD/export.php?action=export"><i class="fas fa-file-excel"></i>Exporter</a>
            
            <!--filter par etat  or date_achat-->
            <div class="filtrage">
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="filter" id="filter">
              <option value="" disabled="" selected="">Etat</option>
        
              <option value="disponible">Disponible</option>
              <option  value="en stock">en stock</option>
              <option  value="perdu">perdu</option>
              
            </select>
            <input type="date" name="datefilter" id="datefilter">
            </div>
        </div>
      </div>
    <br>
    <div class="dropdown-devider border-warning"></div>
    <!--table of composants-->
    <div class="row">
       <div class="table-responsive" id="OrderTable">
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
//create connection
include("conn.php");



$keyword=$_POST['keyword'];
//read all row from databse tables
$sql="SELECT * FROM composants where Nom like '%{$keyword}%'";
$statement=$database->prepare($sql);
$statement->execute();
$composants=$statement->fetchAll(PDO::FETCH_OBJ);
//check the excution

if($statement->rowCount()>0){
    foreach($composants as $composant){
        echo'<tr>
        <th scope="row">'.$composant->id.'</th>
        <td>'.$composant->Nom.'</td>
        <td><img src='.$composant->Photo.' width ="100px" height ="100px"></td>
        <td>'.$composant->Date_achat.'</td>
        <td>'.$composant->Qte.'</td>
        <td>'.$composant->Etat.'</td>
        
        <td>
        <a href="/CRUD/modifierComposant.php?  id='.$composant->id.'" class="text-primary me-2 editBtn "title="modifier"><i class="fas fa-edit"></i></a>
        </td>
        <td>
        <a href="/CRUD/supprimerComposant.php? id='.$composant->id.'" class="text-danger me-2 deleteBtn " title="supprimer"    ><i class="fas fa-trash-alt"></i></a>
        </td>
      </tr>';
    }
}

?>
   
   

  </tbody>
</table>
       </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  /*add ajax to filter the list of iots*/
    $(document).ready(function(){
        $("#filter").on('change',function(){
            var value=$(this).val();
            $.ajax({
                url:"filter.php", 
                type:"POST",
                data:'request=' + value,
                beforeSend:function(){
                    $("#OrderTable").html("<span>WORKING...</span>");

                },
                success:function(data){
                    $("#OrderTable").html(data);
                }

            });
         
            
        });
        $("#datefilter").on('change',function(){
            var value=$(this).val();
            $.ajax({
                url:"filter.php",
                type:"POST",
                data:'request=' + value,
                beforeSend:function(){
                    $("#OrderTable").html("<span>WORKING...</span>");

                },
                success:function(data){
                    $("#OrderTable").html(data);
                }

            });
         
            
        });

    });
  /*une message d'alert pour supprimer composant */
    $(document).ready(function(){
        $(".deleteBtn").on('click',function(e){
            e.preventDefault();
            var href=$(this).attr('href');
            if(confirm("voulez vous supprimer ce composant?")){
                document.location.href
                =href;
            }
        });
    });
    // message d'alert pour inserer composant
  
    // message d'alert pour modifier composant
    $(document).ready(function(){
        $(".editBtn").on('click',function(e){
            e.preventDefault();
            var href=$(this).attr('href');
            if(confirm("voulez vous modifier ce composant?")){
                document.location.href
                =href;
            }
        });
    });
    

          



   




</script>



  


</body>
</html>
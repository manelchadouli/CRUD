<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
         <title>home</title>
    </head>
<style>
      
#search{
    float: right;
    margin-left:650px;
    margin-right: 0;
    margin-top: 0;
    margin-bottom: 0;
    padding: 10px;
    width: 100%;
    height: 100%;
    background: #fff;
    border: 0;
    border-radius: 0;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    -o-border-radius: 0;
    -ms-border-radius: 0;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    -o-box-shadow: none;
    -ms-box-shadow: none;
    box-shadow: none;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}
#logout{
    float:right;
    margin-right: 0;
    margin-top: 0;
    margin-bottom: 0;
    padding: 10px;
    width: 100%;
    height: 100%;
    border: 0;
    border-radius: 0;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    -o-border-radius: 0;
    -ms-border-radius: 0;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    -o-box-shadow: none;
    -ms-box-shadow: none;
    box-shadow: none;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;

}
/*some space between the search bar and the logout button*/
#logout{
    margin-right: 2px;
}
/*some space between the navbar and the content of the page*/
body{
    margin-top: 5px;
}

/*put the add_compo in a circle */
.add_compo{
    border-radius: 50%;
    width: 50px;
    height: 50px;
    background-color: #f5f5f5;
    color: white;
    text-align: center;
    font-size: 30px;
    padding: 10px;
    margin-top: 10px;
    margin-left: 10px;
    margin-right: 10px;
    margin-bottom: 10px;
    float: right;
}
/*let the add_compo move when scrolling the page*/
.add_compo{
    position: fixed;
    bottom: 20px;
    right: 20px;
}

 







        

    </style>
    <body>
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
              <form class="d-flex"  method="POST"  >
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" id="search" >
                <button class="btn btn-outline-success" name="search" >Search</button>
              </form>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/CRUD/welcome.html" role="button" id="logout">déconnecter</a>
              </li>
              </ul>
              <!--add a search bar-->
             

              
              
          </div>
        </div>
    </nav> 
        <!--first page after login -->
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
};
//affisher chaque composant dans un div 
$sql="SELECT * FROM composants";
$statement=$database->prepare($sql);
$statement->execute();
$composants=$statement->fetchAll(PDO::FETCH_OBJ);
?>
<div class="container">
<div class="row">
<?php foreach($composants as $composant): ?>
<div class="col-md-3">
<div class="card mb-4 shadow-sm">

<div class="card-body">
<img src="<?= $composant->Photo ?>" class="card-img-top" alt="..." width ="200px" height ="70px">
<h5 class="card-title"><?= $composant->Nom ?></h5>
<p class="card-text"><?= $composant->Date_achat ?></p>
<p class="card-text"><?= $composant->Etat ?></p>
<div class="d-flex justify-content-between align-items-center">

<small class="text-muted"><?= $composant->Qte ?> DT</small>
</div>
</div>
</div>
</div>
<?php endforeach; ?>
</div>
</div>
<div class="add_compo">
    <a href="/CRUD/ajouterComposant.html">
      <i class="fas fa-plus"></i>
    </a>
</div>


    </body>
</html>


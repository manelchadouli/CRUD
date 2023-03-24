
<?php

 //include_once('connection.php');
 $username="root";
$password="M@*chlml2001";
try{
$database=new PDO("mysql:host=localhost;dbname=web_db",$username,$password);}
catch(PDOException $e){
    echo 'erreur de connection: '. $e->getMessage();
};





function test_input($data) {
	
 	$data = trim($data);
 	$data = stripslashes($data);
 	$data = htmlspecialchars($data);
 	return $data;
 }

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$username = test_input($_POST["user"]);
    
    $password = test_input($_POST["pass"]);
 	$stmt = $database->prepare("SELECT * FROM user");
 	$stmt->execute();
 	$users = $stmt->fetchAll();
	
	foreach($users as $user) {
		
		if(($user['username'] == $username) &&
 			($user['password'] == $password)) {
				
             session_start();
              $_SESSION['USER'] = $username;
              $_SESSION['PASSWORD'] =$password;
          
            header("Location: home.php");
}
 		else {
            
 			// echo "<script language='javascript'>";
 			// echo "alert('WRONG INFORMATION')";
 			// echo "</script>";
             echo  '<script>
                        window.location.href = "login.php";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
            //  die();
		}
 	}
 } 


 
    ?>

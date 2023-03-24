<?php 
    //include("connection.php");
    $username="root";
$password="M@*chlml2001";
try{
$database=new PDO("mysql:host=localhost;dbname=web_db",$username,$password);}
catch(PDOException $e){
    echo 'erreur de connection: '. $e->getMessage();
};
     include("validate.php")
?>
    
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
    <body>
        
    <div class="wrapper">
 	<div class="heading">
 		<h1>Login Form</h1>
 	</div>
	<div class="form">
 		<form  name="form" action="validate.php" onsubmit="return isvalid()" method="POST">
 			<span>
 				<i class="fa fa-user"></i>
 				<input type="text" id="user" placeholder="Username" name="user">
 			</span><br>
 			<span>
                <i class="fa-solid fa-lock"></i>
 				<input type="password" id="pass" placeholder="Password" name="pass">
 			</span><br>
 				<button type="submit" id="btn" value="Login" name = "submit">login</button>
		</form>
	</div>
 	</div>
 </div>



        <script>
            function isvalid(){
                var user = document.form.user.value;
                var pass = document.form.pass.value;
                if(user.length=="" && pass.length==""){
                    alert(" Username and password field is empty!!!");
                    return false;
                }
                else if(user.length==""){
                    alert(" Username field is empty!!!");
                    return false;
                }
                else if(pass.length==""){
                    alert(" Password field is empty!!!");
                    return false;
                }
                
            }
        </script>

    </body>
</html>




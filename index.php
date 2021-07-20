<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
<style>
     img
         {
             width:20%;
             height:20%;
             border-style:solid;
             border-radius:50%;
            background-repeat:no-repeat;
            padding: 15px 80px 10px 80px;
         }
         .container {
  padding: 10px 80px 10px 80px;
} 
.login{
width:360px;
margin:50px auto;
font:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
border-radius:10px;
border:2px solid #ccc;
padding:10px 10px 25px;
margin-top:70px; 
}
input[type=text], input[type=password]{
width:99%;
padding:10px;
margin-top:8px;
border:1px solid #ccc;
padding-left:5px;
font-size:16px;
font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; 
}
.submitbtn{
  
  align-items: center;
  padding: 15px 25px;
  font-size: 15px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;

}
.submitbtn:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.submitbtn:hover {
  opacity:1;
  background-color: #3e8e41
}
body{
            background-color: #d6f5d6;
          }
</style>
</head>
<body style="background-color:;" >
    <br>
    <br>
    <br>
    <div class="container">
    	<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'fitness_centre_management_system');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      if(isset($_POST['login'])){
      	$username = mysqli_real_escape_string($db,$_POST['user']);
      	$password = mysqli_real_escape_string($db,$_POST['pass']); 
      
      	$sql = "SELECT * FROM adminid WHERE user = '$username' and pass = '$password'";
      	$result = mysqli_query($db,$sql);
      	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);      
      	// If result matched $username and $password, table row must be 1 row
      	if($row) {  
         	 header('location: Admin.php');
      	}
      	else {
?>
			<p class="error" style="background: #f2dede; color: #a94442; padding: 10px; border-radius: 5px; align-items:center;">
				<?php echo "Incorrect Username or password"?>
			</p>
<?php
        }
      }
   }
?>
     <div style="background-color: #095a09;">
         <div class="panel-heading" style="font-size:35px; font-family:monotype corsiva; color:yellow;"><center><marquee>Admin Login</marquee> </center></div>
         <div class="panel-body" style="background-color: #b3ffb3 ;">
            <div class="row" style="text-align:center;"> 
                <div class="col-xs-12" style="text-align:center; margin-top:15px;">   
                    <img src="assets/final.jpg" alt="Responsive image" style="width:12%;  border-style:none;">    
   </div> 
        </div>

<form action="" method="POST" style="text-align:center;">
<input type="text" placeholder="username" name="user"><br/><br/>
<input type="password" placeholder="password" name="pass">
  <br/><br/>
<button type="submit" name="login" class="submitbtn">Login</button>
</body>
</html>
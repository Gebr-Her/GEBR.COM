
<?php
$fname="";
$password="";
$err="";
//database Connect 
$conn=mysqli_connect("localhost","root","","db");

if(isset($_post['LOGIN'])){
    $fname=mysqli_real_escape_string($conn,$_post['fname']);
    $password=mysqli_real_escape_string($conn,$_post['password']);
    
    $sql="select * from user where first name='".$fname."' 
    and password='".$password."'limit 1";
     $result=mysqli_query($conn,$sql);
    if(empty($fname)){
        $err="user name is required!";
    }  
    else if(empty($password)){$err="password is required!";}
    else if(mysqli_num_rows($result==1)){
        header('location: home.php');

    } else{ $err="user name or password is inccorect !";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login system</title>
    <link rel="stylesheet" href="css/Login_style.css">
    </head>
    <body>
    <div class="box">
    <h1> Engineer  Abiy's website  Login Here.</h1>
    <div class="err">
        <?php echo $err;?>
    </div>
    <form action="Login.php" method="post">
		<input type="text"name="fname"id=""placeholder="Enter User name">
        <input type="password"name="password" id=""
        placeholder="Enter password">
        <input type="submit" value="LOGIN" name="LOGIN">
        Not yet a member? <a href="signup.php" style="color:#fff107;"> Signup</a>
        </form>  
</div>
    
</body>
</html>


<html>
    <head>
       <link rel="stylesheet" type="text/css" href="alogin.css">  
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>
<ul class="menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="contactus.php">Contact US</a></li>
                <li><a href="about.php">About</a></li>
                </ul>

<div class="logwrap">
<form action="" method="post">

<?php
  session_start();
 include("db/db_config.php");
 

  if(isset($_POST['submit']))
   {   
      $error=array();
    if(empty($_POST['usname'])){
                 $error['username']="USERNAME MISSING";
         }else{
           $Username=mysqli_escape_string($db,$_POST['usname']);
         }
    if(empty($_POST['pword'])){
      $error['password']="PASSWORD MISSING";

    }else{
      $Password=mysqli_real_escape_string($db,$_POST['pword']);
    }
    if(empty($error)){
  
            $insert=mysqli_query($db, "SELECT Username, Password from register WHERE Username
             ='".$Username."'AND Password='".$Password."'") or die(mysqli_error($db));

            if(mysqli_num_rows($insert)==1){
              $_SESSION["Logged_in"]=true;
              $_SESSION["Username"]=$Username;
              header("location: login_home.php");
            }
            else{

              echo"<p>The Username and Password are incorrect</p>";
            }
    } 
    foreach($error as $err){
      echo"<p>$err</p>";
      }
  }
    
      
     
    
    
    
  
  

  
?>

  
          

  <div class="loginht">
    <input id="tab1" type="radio" name="tab" class="signin" checked>
    <label for="tab1" class="tab"> Sign in</label>

    <div class="loginform">
      <div class="signinht">
       <div class="group">
         <br/>
          <label for="user" class="label" >Username</label>
          <input id="user" name="usname" type="text" class="input">
</div>
<br/>

<div class="group">
  <label for="pass" class="label">Password</label>
  <input id="pass" type="password" class="input" name="pword" data-type="password">

</div>
<div class="group">
  <br/>
  <input type="submit" name="submit" class="button" value="Sign In">
</div>
<div class="hr"></div>
				<div class="foot-lnk">
        <br/>
				<p>	<a href="register.php">SIGN UP HERE</a></p>
				</div>

</div>
</div>
</div>
</form>
			</div>
      



</body>
<html>

<!-- <div class="main">
<h1>LOGIN</h1>
<form action="" method="post">
<p>Username:<input type="text" name="user"></p>
<p>Password:<input type="password" name="pword"</p>
<p><input type="submit" name="submit" value="login"></p>
<br/>
<h2>New User?</h2>
<h3><a href="register.php">Click here to Register</a></h3>
</div> -->
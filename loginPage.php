<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginPage.css">
    <title>Login Page</title>
</head>
<body>
    <script>
        function search()
        {
            document.getElementById("atype").value="s";
            document.form1.action="loginPage.php";
            document.form1.submit();
        }
    </script>
    <centre>
    <?php
        $pswd= "";
        $uname="";
        if(isset($_POST['password']))
   {
    $pswd= $_POST['password'];
    $conn= new mysqli("localhost","root","", "adminlogin");

        if($_POST['atype']=="s")
        {
            
            $sql = "SELECT * FROM loginpage where password='$pswd'";
            $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                    header("location: homePage.php");
              }
            else
            {
                echo "Not Found!!! Please create a account";
            }
            
        }
    }
        ?>
        <div class="bgimage">
   <form action="loginPage.php" method="post" name="form1"  class="container">
        <h1>LOGIN</h1>
	<h4> Please fill this form to Log In</h4>
    	<hr>
  	<label for="username"> <b> Username </b> </lable><br>
        <i class ="fa fa-user" aria-hidden="true"></i>
        <input type="text" placeholder="Admin name" name="adminname" value="<?php echo $uname?>" required>
        <label for="password"> <b> Password </b> </lable> <br>
        <i class ="fa fa-lock" aria-hidden="true"></i>
        <input type="password" placeholder="Password" name="password" value="<?php echo $pswd ?>" required>
        <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      	</label>
	
        <input type="button"  name="login" value="Log In" onclick="search()" class="btn">
	<p>Create a new account?<a href ="signup.php">Sign up now</a></p>
    <input type="hidden" name= "atype" id= "atype">
   </form>
</div> 
    </centre>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Sign Up Page</title>
</head>
<body>
<script>
function insert()
{
    document.getElementById("btype").value="i";
    document.form2.action="signup.php";
    document.form2.submit();
}
</script>
<centre>
<?php
    $usname="";
    $passwd="";
    if(isset($_POST['password']))
    {
        $usname= $_POST['username'];
        $passwd= $_POST['password'];
        $con= new mysqli("localhost", "root","","adminlogin");
        $smt= $con->prepare("insert into loginpage(username,password) values(?,?)");
        $smt->bind_param("ss",$usname,$passwd);
        $smt->execute();
        echo "Account created Successfully";
    }
?>
    <div class="bgimage">
    <form action="signup.php" method="post" name="form2" class="container">
    <div class="signup-box">
    <h1>Sign Up</h1>
    <h4> Please fill this form to create an account </h4>
    <hr>
  <label for="username"> <b> Username </b> </lable><br>
    <input type="text" placeholder="username" name="username" value="<?php echo $usname ?>" required><br>
  <label for="password"> <b> Password </b> </lable> <br>
    <input type="password" name="password" placeholder="password" value="<?php echo $passwd ?>" required><br>

      <label for="password"> <b> Confirm Password </b> </lable> <br>
    <input type="password" name="password" placeholder=" confirm password"  required><br>
    
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
   
    <input type="button" value="Sign Up" name="signup" onclick="insert()" class="btn"><br>
    <a href="loginPage.php" >Log In</a>

    </div>
    <input type="hidden" name= "btype" id= "btype">
    </form>
</div>
    </centre>
</body>
</html>
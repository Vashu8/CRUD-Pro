<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
</head>
<body>
    <h1>LOGIN PAGE </h1>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-8">
            <form action="" method="post">
            <label for="">Username</label>
            <input type="text" class="form-control" name="email">
            <label for="">Password</label>
            <input type="password" class="form-control" name="pass">
            <input type="submit" class="btn btn-success" name="sub"><br>
            <a href="reg.php" class="btn btn-danger">Register Yourself</a>
            </form>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</body>
</html>
<?php 
include("connection.php");
if(isset($_POST['sub'])){
     extract($_POST);
                $pass1=md5($pass);
                $data=mysqli_query($con,"select * from register where email='$email' and password='$pass1'") or die(mysqli_error($con));
                $total=mysqli_num_rows($data);
                if($total==1){
                    $_SESSION['user']=$email;
                header("location:dashboard.php"); 
                }
                else{
                echo"<script>alert('Wrong id or password</script>')";
                }
}
?>
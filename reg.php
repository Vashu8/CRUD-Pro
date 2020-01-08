<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
<!--    <script src="validate.js"></script>-->
</head>
<body>
        <div class="container">
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <form name="myform" action="" method="post" enctype="multipart/form-data">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name">
        <label for="" name="gender">Gender</label>
        <input type="radio" name="gender" value="male" checked>Male
        <input type="radio" name="gender" value="female" >Female <br> <br>
        <label for="">Mobile</label>
        <input type="text" name="mobile" class="form-control">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email">
        <label for="">Password</label>
        <input type="password" class="form-control" name="pass">
        <label for="">Upload Photo</label>
        <input type="file" name="image"> <br>
        <label for="">Address</label><br>
        <textarea name="address" id="" cols="30" rows="10"></textarea> <br>
        
        <input type="submit" class="btn btn-success" name="sub">
        </form>
        <a href="index.php" class="btn btn-primary">Login Now</a>
        </div>
        <div class="col-md-2"></div>
        </div>
        </div> 
        
</body>
</html>
<?php 
include("connection.php");
if(isset($_POST['sub'])){
    extract($_POST);
    $tmpname=$_FILES['image']['tmp_name'];
    $uniquename=uniqid().$_FILES['image']['name'];
    $check=  mysqli_query($con,"select * from user where email='$email'");
    $user= mysqli_num_rows($check);
    if($user)
    {
        echo "username already exists";
    }
    else{
        $pass1=md5($pass);
    if(move_uploaded_file($tmpname,"assets/images/$uniquename")){
    if(mysqli_query($con,"insert into register(name,email,password,image,address,gender) values ('$name','$email','$pass1','$uniquename','$address','$gender')")
        or die(mysqli_error($con))){
            echo"<script>alert('Register Successfully.')</script>";
        } 
    }

    }
//    echo $name;
//    echo $gender;
//    echo $mobile;
//    echo $email;
//    echo $pass;
//    echo $cpass;
//    echo $imgname,"<br>";
//    echo $tmpname;
//    echo $address;
}
?>
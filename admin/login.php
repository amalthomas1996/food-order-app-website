<?php
include('config/constants.php')
?>

<html>
    <head>
        <title>
           Login
        </title>
        <link rel="stylesheet" href="../css/admin.css">

    </head>
    <body class="body">
    <div class="login-container">
        <div class="login">
            <h1 class="text-center">Welcome Admin</h1><br/><br/>
            <br>
            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }

            ?>
            <br>
             <form action="" method="POST" class="text-center">
                
                <br/>
                <input class="input-class" type="text" name="username" placeholder="Username">
                <br/><br/>
                
                <br/>
                <input class="input-class" type="password" name="password" placeholder="Password"><br/><br/>
                <input class="button-6"type="submit" name="submit" value="Login" class="btn-primary"><br/><br/>
                <input class="button-6"type="submit" name="home" value="Back to Home" class="btn-primary"><br/><br/>
             </form>
            <p class="text-center">Created By TEAM ONE</p>
        </div>
            </div>
    </body>

</html>
<?php
 if(isset($_POST['submit']))
 {
    $username= $_POST['username'];
    $password= md5($_POST['password']);

    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
    $res  = mysqli_query($conn,$sql);
    
    $count = mysqli_num_rows($res);
    if($count>0)
    {
        $_SESSION['login'] = "<div class='success'>Login Successfull </div>";
        $_SESSION['user'] = $username;



        header('location:'.SITEURL.'admin/');
    }
    else
    {
        $_SESSION['login'] = "<div class='error text-center'>Username And Password Did Not Match </div>";
        header('location:'.SITEURL.'admin/login.php');
    }
 }
 elseif(isset($_POST['home']))
 {
    header('location:'.SITEURL.'index.php');
 }
?>
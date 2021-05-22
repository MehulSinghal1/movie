<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
     
    $sql = "Select * from users where username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['password'])){ 
                $login = true;
                header("location: index.html");
            } 
            else{
                $showError = true;
            }
        }
        
    } 
    else{
        $showError = true;
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In Page</title>
    <link rel="stylesheet" href="signup.css">
  
</head>
<body>
<?php require '_dbconnect.php' ?>
    <?php
    if($showAlert){
        echo '<script>alert("Succesfully Signed In")</script>';
    }
    if($showError){
        echo '<script>alert("Invalid Details, Try Signing up")</script>';

    }

   ?> 

<div class="navbar">
        <div class="navbar-container">
            <div class="logo-container">
                <h1 class="logo">MBooker</h1>
            </div>
            <div class="menu-container">
                <ul class="menu-list">
                    <li class="menu-list-item">
                        <a class="navbar-link" href="index.html";>Home</a>
                    </li>
                    <li class="menu-list-item">Movies</li>
                    <li class="menu-list-item">Series</li>
                    <li class="menu-list-item">Popular</li>

                </ul>
            </div>
            <div class="profile-container">
                <img class="profile-picture" src="img/profile.jpeg" alt="">
                <div class="profile-text-container">
                    <a class="navbar-link" href="login.php";>Sign In</a>
                    
                </div>
            </div>
        </div>
    </div>
    
    

    <div class="container">
        <h1>Sign In</h1>
        <form method="post">
        <div class="box">
            <input type="text" name="username" id="username" placeholder="Enter Your Username">
        </div>
        <div class="box">
            <input type="password" name="password" id="password" placeholder="Enter Your Password">
        </div>
        <div>
        <input class='btn' type='submit' value='Sign In'>
         </div>
        <p>
        New User? Click here
        </p>
        <button class="btn">
            <a class="btntext"href="signup.php">Sign Up</a>
        </form>
    </div>





</body>

</html>
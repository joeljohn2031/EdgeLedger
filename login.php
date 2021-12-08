<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to EdgeLedger</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/utilities.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <header class="hero">
        <div class="navbar top" id="navbar">
            <h1 class="logo">
                <span class="text-primary"><i class="fas fa-book-open"></i>Edge</span>Ledger
            </h1>
            <nav>
                <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./index.php#about">About</a></li>
                    <li><a href="./index.php#cases">Cases</a></li>
                    <li><a href="/blog.html">Blog</a></li>
                    <li><a href="./index.php#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
   
  
    <div class="login-box">
    <h2 class="text-primary">Login here</h2> 
        <br>
    <form action="login.php" method="POST" class="login-details ">              
        <?php include('errors.php'); ?>
            <div class="form-control">       
                <input type="text" name="username" placeholder="Username" class="form-input">
            </div>
            <div class="form-control">       
                <input type="password" name="password" placeholder="Password" class="form-input">
            </div>
            <br>
            <div class="login-btn">       
                <button type="submit" name="login" class="btn-primary btn"> Login</button>
            </div>
    </form>

    <p>Not a member? <a class="sign-up" href="./register.php">Sign up</a></p>
     </div>
        
       
    <?php
        require('db.php');
        if(isset($_POST['login'])){
        
            $username = stripslashes($_REQUEST['username']);    // removes backslashes
            $username = mysqli_real_escape_string($con, $username);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con, $password);

            $query= "SELECT * FROM users where username='$username' and password ='".md5($password)."'";
            $result=mysqli_query($con, $query) ;
            $rows = mysqli_num_rows($result);
            
            if ($rows == 1) {
                $_SESSION['username'] = $username;
                // Redirect to user dashboard page
                header("Location: dashboard.php");
            } else {
                echo "<div class='form'>
                    <h3>Incorrect Username/password.</h3><br/>
                    <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                    </div>";
            }
        }
    ?>
    </header>
<footer class="footer bg-dark">
        <div class="social">
            <a href="#"><i class="fab fa-facebook fa-2x"></i></a>
            <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
            <a href="#"><i class="fab fa-youtube fa-2x"></i></a>
            <a href="#"><i class="fab fa-linkedin fa-2x"></i></a>

        </div>
        <p>Copyright &copy; 2020 - EdgeLedger</p>
    </footer>
</body>
</html>
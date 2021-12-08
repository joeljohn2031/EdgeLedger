<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/forms.css">
  <link rel="stylesheet"  href="css/style.css">
  <link rel="stylesheet" href="css/utilities.css">
  
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
  	<h2 class="text-primary">Register</h2>
  
	
  <form  action="register.php" method="post" class="login-details">
  	<?php include('errors.php'); ?>
      <div class="form-control">
      <input type="text" name="username" class="form-input" placeholder="Enter Username"value="<?php echo $username; ?>">
      </div>
      <div class="form-control">
        <input type="email" name="email" class="form-input" placeholder="Email id"value="<?php echo $email; ?>">
      </div>
      <div class="form-control">        
        <input type="password" name="password_1" class="form-input" placeholder="Password">
      </div>
      <div class="form-control">        
        <input type="password" name="password_2" class="form-input"placeholder="Confirm Password">
      </div>
      <div class="input-group">
        <button type="submit" class="btn" name="reg_user" >Register</button>
      </div>
  	<p>
  		Already a member? <a style="color:#28a745" href="login.php">Sign in</a>
  	</p>
  </form>
  </div>
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
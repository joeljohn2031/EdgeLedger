<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }
    require('db.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/utilities.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/forms.css">
  
   </head>
<body class="gradient">
 
<header> 
<div class="navbar" id="navbar">
            <h1 class="logo">
                <span class="text-primary"><i class="fas fa-book-open"></i>Edge</span>Ledger
            </h1>
            <nav>
                <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./index.php#about">About</a></li>
                    <li><a href="./index.php#cases">Cases</a></li>
                    <li><a href="/blog.html">Blog</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
</header>
<main>   
        <br><br><br>
        <div class="user">
            <p >Hey, <?php echo $_SESSION['username']; ?>!</p>
            <p>You are now at User Dashboard</p>
            <p><a class="logout"href="logout.php">Logout</a></p>

        <?php 
        $usr = mysqli_real_escape_string($con, $_SESSION['username']);
        $bal=mysqli_query($con,"SELECT balance from trans 
        WHERE username='$usr'
        ORDER BY trans_id DESC LIMIT 1");//retrieving balance from last transaction
        
        $row = mysqli_fetch_row($bal);
        
        ?>
        <p style="text-align:center; font: size 40px;">Current Account Balance</p>
       <p class="balance">
        Rs. <?php echo $row[0];?>
        </p>
        
        </div>

        <div class="transaction container"> 
            <form action="dashboard.php" method="post" >
                <div class="input-group ">   
                    <input class="form-control"type="number" id="amount" name="amount" placeholder="Enter amount">
                    
                </div> 
                <div class="input-group ">   
                    <input class="form-control" type="text" id="remarks" name="remarks" placeholder="Enter remarks">
                
                </div>
                <div class="input-group">   
                <button class="btn btn-primary" type="submit" name="submitD" 
                formaction="./debit.php">Debit</button>
                </div>

                <div class="input-group">   
                <button class="btn btn-secondary" type="submit" name="submit" formaction="./credit.php">Credit</button>
                </div>

                <div class="input-group">   
                <button class="btn btn-light" type="submit" name="submitP" formaction="./passbook.php">Passbook</button>
                </div>
        </form>
    </div>       
        <br>
        <br>
       
</main>

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
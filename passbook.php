<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passbook</title>
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
    <?php    
    require('db.php');
       //include('dashboard.php');
       // include('errors.php');
       if(isset($_POST['submitP'])){
       
        $usr = mysqli_real_escape_string($con, $_SESSION['username']);
        
        $sql= "SELECT * FROM trans WHERE username='$usr'";
        $result = mysqli_query($con, $sql);
        echo "<td> Transaction ID |</td>";
            echo "<td> Remarks |</td>";
            echo "<td> Transaction Time |</td>";
            echo "<td> Debit |</td>";
            echo "<td> Credit |</td>".'<br>';
        
        while($row=mysqli_fetch_row($result)){
            echo "<td>".$row[0]." |</td>";
            echo "<td>".$row[2]." |</td>";
            echo "<td>".$row[3]." |</td>";
            echo "<td>".$row[4]." |</td>";
            echo "<td>".$row[5]." |</td>".'<br>';

        }
       }
    ?>
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
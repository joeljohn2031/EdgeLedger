<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debit Amount</title>
</head>
<body>
<?php
    
    require('db.php');
       //include('dashboard.php');
       // include('errors.php');
       if(isset($_POST['submitD'])){
       
        $usr = mysqli_real_escape_string($con, $_SESSION['username']);
        //retrieving variables from dashboard
        $remks=$_POST['remarks'];
        $dbt=$_POST['amount'];
        //echo "$remks.$dbt";
        $bal=mysqli_query($con,"SELECT balance from trans 
        WHERE username='$usr'
        ORDER BY trans_id DESC LIMIT 1");//retrieving balance from last transaction
        $row = mysqli_fetch_row($bal);
        $fin_amt=$row[0]-$dbt;//debit to the last balance received

        echo "ACCOUNT BALANCE NOW:Rs. $fin_amt/- ";
        $sql= "INSERT INTO trans (username,remarks,debit, balance ) VALUES ('$usr','$remks','$dbt', '$fin_amt')";
        $result = mysqli_query($con, $sql);
        if($result)
            {   
                echo "\nAmount Debited.";
                header("Location: dashboard.php");}
        else
            echo "\nAmount NOT Debited";
            header("Location: dashboard.php");}
   
            ?>
</body>
</html>

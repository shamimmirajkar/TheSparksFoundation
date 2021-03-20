<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transaction</title>
  <link rel="stylesheet" href="index.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="users.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
 <div class="header">
        <a href="#" class="logo"><i class="fa fa-university"></i>SM Bank</a>
        <div class="header-right" id="myheader-right">
         
          <a href="index.php"><i class="fa fa-fw fa-home"></i>Home</a>
          <a href="contact.php"><i class="fa fa-fw fa-envelope"></i>Contact</a>

    
        </div>
      </div>

      <?php
      $connect=mysqli_connect("localhost" , "root" , "" , "bankingsystem");
      if (!$connect) {
    die("unable to connect due to some failure " . mysqli_connect_error());
  }
  if (isset($_REQUEST['c_id'])) {
    $senderid = $_GET['c_id'];
    $query1 = "SELECT * FROM  clients where c_id=$senderid";
    $result = mysqli_query($connect, $query1);
    if (!$result) {
        echo "Error : " . $query1 . "<br>" . mysqli_error($connect);
    }
    $rows = mysqli_fetch_assoc($result);
}
?>
<form method="post">
<h1>TRANSFER</h1>
        <table>
            <tr>
                <th>Client ID</th>
                <th>Client NAME</th>
                <th>Client MAIL</th>
                <th>Client BALANCE</th>
            </tr>
            <tr>
                <td><?php echo (isset($rows['c_id']) ? $rows['c_id'] : ''); ?></td>
                <td><?php echo (isset($rows['c_name']) ? $rows['c_name'] : ''); ?></td>
                <td><?php echo (isset($rows['c_mail']) ? $rows['c_mail'] : ''); ?></td>
                <td><?php echo (isset($rows['c_balance']) ? $rows['c_balance'] : ''); ?></td>
            </tr>
        </table>
          <br>
          <br>
          <br>
          <br>

        <div class="main">
        <label for="to" id="transfer">Transfer To:</label>
        <select id="to" name="to"  required>
                    <option value="" disabled selected>Choose</option>
                    <?php
                   $connect=mysqli_connect("localhost" , "root" , "" , "bankingsystem");
                   if (!$connect) {
                          die("unable to connect due to some failure " . mysqli_connect_error());
                                 } ;
                    $senderid = $_REQUEST['c_id'];
                    $sql = "SELECT * FROM clients where c_id!=$senderid";
                    $result = mysqli_query($connect, $sql);
                    if (!$result) {
                        echo "Error " . $sql . "<br>" . mysqli_error($connect);
                    }
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <option  value="<?php echo $row['c_id']; ?>">

                            <?php echo $row['c_name']; ?> 

                        </option>
                    <?php
                    }
                    ?>
            </div>
            </select>
            <br>
            <br>
            <br>
            <label for="amount">Amount:</label>
            <input type="number" name="amount" id="amount" required>
            <div class="main1">
              <br>
              <br>
                <input type="submit" name="submit"  id="submit" value="TRANSFER">
            </div>
            <br>
        </form>
        <br>
<br><br>
        <footer>
       <br>&copy;2021<br/>
       <p>Created by MIRAJKAR SHAMIM </p>
       <i class="fa fa-fw fa-envelope"></i>
      &nbsp <a href="#">xyz@gamil.com</a>
       <p>The Sparks Foundation </p>      
            <a href="#">Terms</a>
    </footer> 
        
</body>
</html>
<?php

$connect=mysqli_connect("localhost" , "root" , "" , "bankingsystem");
      if (!$connect) {
    die("unable to connect due to some failure " . mysqli_connect_error());
  }
  

if (isset($_POST['submit'])) {
   
    $from = $_GET['c_id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from clients where c_id=$from";
    $query = mysqli_query($connect, $sql);
    $sql1 = mysqli_fetch_array($query);

   
    if (($amount) < 0) {
        echo '<script>';
        echo ' alert("Enter the correct amount!!!")';  
        echo '</script>';
    }

   
    else if ($amount > $sql1['c_balance']) {
        echo '<script>';
        echo ' alert("Sorry, Insufficient balance!!!")';  
        echo '</script>';
    }

   
    else if ($amount == 0) {

        echo "<script>";
        echo "alert('Some amount needs to be entered for transferring')";
        echo "</script>";
    } else {
        $sql = "SELECT * from clients where c_id=$to";
        $query = mysqli_query($connect, $sql);
        $sql2 = mysqli_fetch_array($query);

        $sender = $sql1['c_name'];
        $receiver = $sql2['c_name'];

        
        $newbalance = $sql1['c_balance'] - $amount;
        $sql = "UPDATE clients set c_balance=$newbalance where c_id=$from";
        mysqli_query($connect, $sql);

       
        $newbalance = $sql2['c_balance'] + $amount;
        $sql = "UPDATE clients set c_balance=$newbalance where c_id=$to";
        mysqli_query($connect, $sql);


        $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
        $query = mysqli_query($connect, $sql);

        if ($query) {
            echo "<script> 
            alert('Transaction was Successful !!');
            window.location='transaction_history.php';
            </script>";
        }

        $newbalance = 0;
        $amount = 0;
    }
}
?>
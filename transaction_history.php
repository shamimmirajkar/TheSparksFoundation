<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transaction History</title>
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
    <h1>Transaction History</h1>
<table>
    <tr>
        <th>NO</th>
        <th>SENDER</th>
        <th>RECEIVER</th>
        <th>TRANSFER AMT</th>
        <th>DATE-TIME</th>  
    </tr>
<?php

$connect=mysqli_connect("localhost" , "root" , "" , "bankingsystem");
$query="Select * from transaction";
$result=mysqli_query($connect, $query);
if($result->num_rows>0)
{
    
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["no"]. "</td><td>"
        . $row["sender"]. "</td><td>" .$row["receiver"]. "</td><td>" .$row["balance"]. "</td><td>" .$row["date_time"]. "</td></tr>";
        }
    echo "</table>";
}
    else
   { echo " ";
}


?>
</table>
<br>
<br><br><br>
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
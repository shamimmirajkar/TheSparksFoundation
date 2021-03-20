<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Client details</title>
  <link rel="stylesheet" href="index.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="users.css">
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
    <h1>Client Details</h1>
<table >
    <tr>
        <th>Client_ID</th>
        <th>Client_NAME</th>
        <th>Client_MAIL</th>
        <th>Client_BALANCE</th>  
    </tr>
<?php

$connect=mysqli_connect("localhost" , "root" , "" , "bankingsystem");
$query="Select * from clients";
$result=mysqli_query($connect, $query);
if($result->num_rows>0)
{
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["c_id"]. "</td><td>"
        . $row["c_name"]. "</td><td>" . $row["c_mail"]. "</td><td>" .$row["c_balance"]. "</td></tr>";
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home</title>
    <style>
    .main{

text-align: center;
}
input{
  background: transparent;
border: 0;
border-bottom: 2px solid darkblue;
outline: 0;
color: darkblue;
padding: 5px 5px;
width: auto;
}
input[type=submit],input[type=reset]{
border: 2px solid darkblue;
border-radius: 3px;

}

    </style>
        
</head>
<body>

    <div class="header">
        <a href="#" class="logo"><i class="fa fa-university"></i>SM Bank</a>
        <div class="header-right" id="myheader-right">
         
          <a  href="index.php"><i class="fa fa-fw fa-home"></i>Home</a>
          <a class="active" href="contact.php"><i class="fa fa-fw fa-envelope"></i>Contact</a>
          
        </div>
      </div>
      <div class=container>
      <div class="main">
      <form action="mail.php" method="POST"><br><br><br>
<p>Name: <input type="text" name="name" required></p><br><br>
<p>Email: <input type="text" name="email" required></p><br> <br>
<p>Message: <input type="textarea" name="message" rows="1" cols="25" required></p><br> <br>
<input type="submit" value="Send">
<input type="reset" value="Clear">

</form>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
<!-- this is a configuration file to connect my frontend to backend. here we are using php 7 so we will use mysqli to establish a connection with mysql. i stands for improvement. -->
<?php
    $insert = false;
    if(isset($_POST['name'])){   //it means only when we enter name then only it  connects else it wont.
    $server = "localhost";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($server,$username,$password);
 
    // this is to test whether it is connected or not.. 
    // die will display the like  echo but mysqli_connect_error gives you the reson of error.
    if(!$conn)
    {
        die("connecting to DB is failed due to " . mysqli_connect_error());
    }

    // echo "successfully connected to DB"; 

    $name = $_POST["name"];
    $age = $_POST["age"];
    $gender =$_POST["gender"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $desc =$_POST["desc"];

    // id will auto increment so dont put id.
    $sql = " INSERT INTO `gamers_zone`.`check_out` (`name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    // here now we will make the connection
    if($conn->query($sql) ==  true)
    {
        // echo "succeddfully inserted";
        $insert = true;
    }
    else
    // to access the error of the $conn connection.
    {
        echo "Error: $sql <br> $conn->error";
    }

    $conn->close();
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>landing form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body>
    <img src="bg.jpg" alt="nhce" >
    <div class="container">
        <h1>Welcome to NHCE Trip</h1>
        <hr>
        <p>submit all your details in the form to particpate trip  </p>
        <p class="para">Thank you for submitting your form</p>
    <!-- <img src="bg.jpg" alt="nhce" > -->
        <form action="" method="post">
            <input type="text" name="name" id="name" placeholder="enter your name">
            <input type="text" name="age" id="age" placeholder="enter your age">
            <input type="text" name="gender" id="gender" placeholder="enter your gender">
            <input type="email" name="email" id="email" placeholder="enter your email">
            <input type="phone" name="phone" id="phone" placeholder="enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="enter address"></textarea>
            <button class="btn">submit</button>
            <!-- <button class="btn">reset</button> -->
        </form>
       
    </div>
    <script src="index.js"></script>
</body>
</html>
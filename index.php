<?php
$insert = false;
if(isset($_POST['name'])){
    //set connection varaibles
    $server = "localhost";
    $username = "root";
    $password = "";

    //create a database connection
    $con = mysqli_connect($server, $username, $password);

    //check for connection success
    if(!$con){
        die("connection to this database failed due to " . mysqli_connect_error());
    }else{
       //echo "success connectiong to the db.";
    }

    //collect post variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO`jessi students`.`students information` (`name`, `age`, `gender`, `email`, `password`, `queries`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$password', '$desc', current_timestamp());";

    //echo $sql;


    //execute the query
    if($con->query($sql) == true){
        //echo "Succesfully inserted";

        //flag for successful connection
        $insert = true;
    }else{
        echo "Error: $sql <br> $con->error";
    }

    //close the database connection
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Hahmlet:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hahmlet:wght@200&family=Style+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Welcome to Top Question Form</title>
</head>
<body>
    <img class="jessi" src="jessi.jpg" alt="cute image">
    <div class="container">
        <h1>Welcome to the Jessi Questions Form</h1>
        <P>Please enter your details and Begin to answer</P>
        <?php
            if($insert == true){
                echo "<p class='submitMsg'>Thanks for submitting your form</p>";
            }    
        ?>
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="password" name="password" id="password" placeholder="Enter your password">
            <textarea name="desc" id="desc" cols="30" rows="7" placeholder="Enter any queries"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>
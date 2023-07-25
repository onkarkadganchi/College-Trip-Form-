<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server,$username,$password);

    if(!$con){
        die("connection to this database is failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip`(`name`, `age`, `email`, `gender`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$email', '$gender', '$phone', '$desc', current_timestamp());";
    //echo $sql;

    if($con->query($sql) == true){
        //echo "Succesfully Inserted";
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="Modern College">
    <div class="container">
        <h1>Welcome to Modern College US Trip Form</h1>
        <P>Enter Your Details to confirm your participation in trip</P>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting the form .We are happy to see you joinning us for the US trip</p>";}
    ?>
        <form action="index1.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="email" id="email" placeholder="Enter your email">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="phone" id="phone" placeholder="Enter your phone no">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter your other information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index1.js"></script>
</body>
</html>
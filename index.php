<?php
        $insert = false;
        if(isset($_POST['name'])){
            // Set connection variables
            $server = "localhost";
            $username = "root";
            $password = "";
        
            // Create a database connection
            $con = mysqli_connect($server, $username, $password);
            if( $con->query("USE students;") == true){
                //echo "Successfully chosen database";
            }
                else{
                    echo "fail query : $sql <br>  $con->error ";
                }
           
        
            // Check for connection success
            if(!$con){
                die("connection to this database failed due to" . mysqli_connect_error());
            }
            // echo "Success connecting to the db";
        
            // Collect post variables
            $roll = $_POST['rollno'];
            $nam = $_POST['name'];
            $gend = $_POST['gender'];
            $ag = $_POST['age'];
            $emai = $_POST['email'];
            $phon = $_POST['phone'];
            $desc = $_POST['desc'];

            $sql = "INSERT INTO `info` (`rollno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$roll', '$nam', '$ag', '$gend', '$emai', '$phon', '$desc', current_timestamp());";
            $sqlprat = "INSERT INTO `info` (`rollno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('55555', 'dgyss', '23', 'male', 'sdfhasdah@yhsdf.com', '1234679012', 'fgvr gr', current_timestamp());";
            if($con->query($sql) == true){
               // echo "Successfully inserted";
               $insert = true;
            }
                else{
                    echo "fail query : $sql <br>  $con->error ";
                }
                $con->close();

        }

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Student Registration Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="img" src="image1.jpeg" alt="Pune Institute of computer technology">
    <div class="container">
        <h1>Welcome to Student Registration Form</h3>
        <p>Enter your details and submit this form to complete your student registration</p>

        <?php
        if($insert == true){
            echo "<p class='submitMsg'>Thanks for submitting your form.</p>";
            }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="rollno" id="rollno" placeholder="Enter your roll number">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>

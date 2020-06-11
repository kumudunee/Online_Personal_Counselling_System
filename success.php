<!DOCTYPE html>
<html>

<?php 
    session_start();

    if (isset($_SESSION['visited'])) {
        header("Location: http://localhost/all/My account.php");
        unset($_SESSION['visited']);
    } else {
        $_SESSION['visited'] = true;
    }
?>

<head>
    <title>Online Personal Counselling</title>
    <link href="success_style.css" rel="stylesheet">
</head>


<body>
    
    <div id="main">
<!-- PHP part ********************************************************************************** -->
    <?php 

        require 'config.php';

        if (isset($_POST["btnSubmit"]))
        {
            $firstName = $_POST["fname"];
            $lastName = $_POST["lname"];
            $email = $_POST["ymail"];
            $birthDay = $_POST["dat"];
            $birthDay =  date("Y-m-d", strtotime( $birthDay) );
            $contry = $_POST["country"];
            $tele = $_POST["contact"];
            $userName = $_POST["uname"];
            $pass = $_POST["cpass"];


            $sql = "INSERT INTO `members`(`first_name`, `last_name`, `email`, `birthday`, `telephone`, `country`, `user_name`, `password`) 
            VALUES ('$firstName', '$lastName','$email','$birthDay',$tele,'$contry','$userName','$pass')";


            if($conn->query($sql)) { ?>
                <div id="reg1">
                    <h1>Registation Successful</h1>
                </div>
            <?php }else 
            { ?>
                <div id="reg2">
                    <h1>Registation Fail</h1>
                </div>
            <?php 
                echo $conn->error;
            }   
        }
        mysqli_close($conn);
    ?>
<!-- end of php part ******************************************************************************************* -->
        <div id="data">
            <h3>Welcome, <?php echo $userName ?></h3><br><br>
            First Name : <?php echo $firstName ?> <br><br>
            Last Name  : <?php echo $lastName ?> <br><br>
            Email      : <?php echo $email ?> <br><br>
            Birthday   : <?php echo $birthDay ?> <br><br>
            Country    : <?php echo $contry ?> <br><br>
            Con. Num   : <?php echo $tele ?> <br><br><br>

            <a href ="My account.php"><button>LOGIN</button></a>

        </div>
    </div>

</body>

</html>
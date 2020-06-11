
<?php ob_start();
?>

<!DOCTYPE html>
<html>

<?php
    session_start();
?>

<head>

    <script>
        function validateForm() {
            var x = document.forms["myForm"]["fname"].value;
            if (x == "") {
                alert("First Name must be filled out");
                return false;
            }
            var a = document.forms["myForm"]["lname"].value;
            if (a == "") {
                alert("Last Name must be filled out");
                return false;
            }
            var b = document.forms["myForm"]["ymail"].value;
            if (b == "") {
                alert("Email must be filled out");
                return false;
            }
            var c = document.forms["myForm"]["dat"].value;
            if (c == "") {
                alert("Date must be filled out");
                return false;
            }
            var d = document.forms["myForm"]["country"].value;
            if (d == "") {
                alert("Country must be filled out");
                return false;
            }
            var e = document.forms["myForm"]["contact"].value;
            if (e == "") {
                alert("Contact must be filled out");
                return false;
            }
            var f = document.forms["myForm"]["uname"].value;
            if (f == "") {
                alert("User Name must be filled out");
                return false;
            }
            var g = document.forms["myForm"]["pass"].value;
            if (g == "") {
                alert("Password must be Entered");
                return false;
            }
            if (7 > g){
                alert("Password didn't match for the given criteria");
                return false;
            }
            var h = document.forms["myForm"]["cpass"].value;
            if (h != g) {
                alert("Confirm password didn't match");
                return false;
            }
        }
    </script>
    <style>
        #form-back {
            padding-left: 10%;
            height: 500px;
            display: block;
            padding-left: 5%;
        }

        #form-back h2 {
            color: green;
            text-align: center;
            margin-top: 0%;
            padding-top: 0;
            font-family: Arial, Helvetica, sans-serif;
        }


        /* form inputs */

        #first-name {
            width: 30%;
            height: 30px;
            margin: 10px;
            padding: 0 5px;
            margin-left: 23px;
            border-color: black;
        }

        #last-name {
            width: 30%;
            height: 30px;
            margin: 10px;
            padding: 0 5px;
            margin-left: 50px;
            border-color: black;
        }

        #email {
            width: 30%;
            height: 30px;
            margin: 10px;
            padding: 0 5px;
            margin-left: 51px;
            border-color: black;
        }

        #date {
            width: 30%;
            height: 30px;
            margin: 10px;
            padding: 0 5px;
            border-color: black;
        }

        #coun {
            width: 30%;
            height: 30px;
            margin: 10px;
            padding: 0 5px;
            margin-left: 43px;
            border-color: black;
        }

        #cont {
            width: 30%;
            height: 30px;
            margin: 10px;
            padding: 0 5px;
            border-color: black;
        }

        #uname {
            width: 30%;
            height: 30px;
            margin: 10px;
            padding: 0 5px;
            margin-left: 23px;
            border-color: black;
        }

        #pass {
            width: 30%;
            height: 30px;
            margin: 10px;
            padding: 0 5px;
            margin-left: 33px;
            border-color: black;
        }

        #cpass {
            width: 30%;
            height: 30px;
            margin: 10px;
            padding: 0 5px;
            margin-left: 18px;
            border-color: black;
        }


        /*form buttons*/

        #signup {
            height: 30px;
            margin-top: 15px;
            background-color: #ff0000;
            border-color: black;
            color: white;
            border-radius: 4px;
        }

        #signup:hover {
            color: #ff0000;
            background-color: white;
            border: 2px solid #ff0000;
        }

        #main-body {
            margin: 0;
            padding-bottom: 10%;
            background-image: url("images/registerback.jpg");
            width: 100%;
            background-size: cover;
            background-position: center;
        }

    </style>


    <title>Online Personal Counselling</title>
    <link href="Accounts_style.css" rel="stylesheet" type="text/css">

</head>

<body>
    <!--Navigation-->
    <div>
        <ul id="navi-bar">
            <img id="logo" src="images/logo.png" alt="Personal Online Counselling">
            <li><a class="nav-item" href="http://localhost/all/Home.php">Home</a></li>
            <li><a class="nav-item" href="http://localhost/all/Service.php">Service</a></li>
            <li><a class="nav-item" href="http://localhost/all/Counsellors.php">Counsellors</a></li>
            <li><a class="nav-item" href="http://localhost/all/Invite.php">Invite</a></li>
            <li><a id="cho-item" href="http://localhost/all/My account.php">My account</a></li>
            <li><a class="nav-item" href="http://localhost/all/Registation.php">Register</a></li>
            <li><a class="nav-item" href="http://localhost/all/About.php">About us</a></li>

        </ul>
    </div>
    <!--Body-->
    <div id = "main-body">
        <div id="user">
            <h1>Hello, <?php echo $_SESSION['userName']; ?></h1>

            <!-- log out button -->
            <form style="display:inline-block; float:right;" method="post"><button id="out" name="out">LOG OUT</button></form>
            <?php
                if(isset($_POST['out']))
                {
                    session_destroy();
                    header("Location: http://localhost/all/My account.php");
                    ob_enf_fluch();
                }
            ?>
        </div>
        <!-- user   Navigation bar  -->
        <div id="user-navi">
            <li><a class="user-navi-item" href="getService.php">Get Service</a></li>
            <li><a class="user-navi-item" href="history.php">History</a></li>
            <li><a id="user-navi-choose" href="details.php">My details</a></li>
        </div>

        <!-- Update form -->
        <div style="display: block; padding-left: 20px;">

 <!-- get data in data base *********************************************************************** -->
        <?php 
            require 'config.php';      

            $id = $_SESSION['memberId'];


            $price = mysqli_query($conn,"SELECT * FROM members WHERE id = $id");
            $result = mysqli_fetch_array($price);
        ?>

        <!-- update form -->
            <div id="form-back">
                <h2>My Details</h2>
                <form name="myForm" onsubmit="return validateForm()" method="post">
                    First Name:
                    <input id="first-name" placeholder="First Name" type="text" name="fname" value="<?php echo $result["first_name"]; ?>"> Last Name:
                    <input id="last-name" placeholder="Last Name" type="text" name="lname" value="<?php echo $result["last_name"]; ?>"><br> E-mail:
                    <input id="email" placeholder="E-mail Address" type="text" name="ymail" value="<?php echo $result["email"]; ?>"><br> Date of Birth:
                    <input id="date" type="date" name="dat" value="<?php echo $result["birthday"]; ?>"><br> Country:
                    <input id="coun" placeholder="Country" type="text" name="country" value="<?php echo $result["country"]; ?>"> Contact Number:
                    <input id="cont" placeholder="Contact number" type="number" name="contact" value="<?php echo $result["telephone"]; ?>"><br> User Name:
                    <input id="uname" placeholder="Username" type="text" name="uname" value="<?php echo $result["user_name"]; ?>"><br> Password:
                    <input id="pass" placeholder="Password min charcter 7" type="password" name="pass" value="<?php echo $result["password"]; ?>"><br> C.Password:
                    <input id="cpass" placeholder="Confirm Password" type="password" name="cpass"><br>
                    <button id="signup" type="submit" name="btnSubmit">Update</button>
                </form>
            
        <!-- update form php part **************************************************************************** -->
                <?php
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


                    $sql = "UPDATE `members` SET `first_name`='$firstName', `last_name`='$lastName', `email`='$email', 
                    `birthday`='$birthDay', `telephone`=$tele, `country`='$contry', `user_name`='$userName', 
                    `password`='$pass' WHERE id = $id";


                    if($conn->query($sql)) { 
                        ?> <h3 style="color:green">Update Succesful</h1> <?php 
                    }else 
                    { 
                        ?> <h3 style="color:red">Update Fail</h1> <?php 
                        echo $conn->error;
                    }   
                }
                mysqli_close($conn);
                ?>
        <!-- end of php part ********************************************************************************* -->

            </div>
        </div>




    </div>
    
    <!--footer-->
    <div id="footer-background">

        <!--address-->
        <div id="foot-addr">
            <h3 class="address">Personal Online Counselling Co.</h3>
            <h3 class="address">New Kandy Road,</h3>
            <h3 class="address">Malambe.</h3>
            <h2 class="address">T.P-0715336370</h3>
        </div>
        <!--social media-->
        <div id="social-media">
            <h3>Follow us :</h3>
            <P>
                <a href=" "><img src="images/fac.png" width="100 "></a>
                <a href=" "><img src="images/ins.png" width="100 "></a>
                <a href=" "><img src="images/twi2.png" width="100 "></a>
            </P>
        </div>
    </div>

</body>

</html>
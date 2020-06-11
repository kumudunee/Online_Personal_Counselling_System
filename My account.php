<!DOCTYPE html>
<html>

<?php
    session_start();

    if (isset($_SESSION['AccType'])) {
        $type = $_SESSION['AccType'];
        if ($type == "member") {
            header("Location: http://localhost/all/Member/getService.php");
        }
        else {
            header("Location: http://localhost/all/admin/Admin.php");
        }
    }
?>

<head>

     <script>
        function validateForm() {
            var x = document.forms["myForm"]["user"].value;
            if (x == "") {
                alert("Email must be filled out");
                return false;
            }
            var a = document.forms["myForm"]["password"].value;
            if (a == "") {
                alert("Password must be filled out");
                return false;
            }
        }
    </script>

    <title>Online Personal Counselling</title>
    <link href="My account_style.css" rel="stylesheet">
</head>

<body>
    <!--Header-->
    <div id="header">
        <!--logo & name-->
        <img id="logo" src="images/logo.png" alt="Personal Online Counselling">
        <h1>Personal Online Counselling</h1>
        <!--search-->
        <div id="search-bar">
            <img src=images/search.png width="30">
            <input type="text" placeholder=" Search...">
        </div>
    </div>
    <!--Navigation-->
    <ul id="navi-bar">
        <li><a class="nav-item" href="Home.php">Home</a></li>
        <li><a class="nav-item" href="Service.php">Service</a></li>
        <li><a class="nav-item" href="Counsellors.php">Counsellors</a></li>
        <li><a class="nav-item" href="Invite.php">Invite</a></li>
        <li><a id="cho-item" href="My account.php">My account</a></li>
        <li><a class="nav-item" href="Registation.php">Register</a></li>
        <li><a class="nav-item" href="About.php">About us</a></li>
    </ul>

    <!--Body-->

    <!--<div style="width:200px; position: absolute; height: 500px; display: block; background-color: lightgray;">
        <a href="#">Hello World!</a>
    </div> -->
    <!--login form-->
    <div id="back-img">
        <div id="login-form">
            <h2>LOG IN</h2>
            <form action="#" name="myForm" onsubmit="return validateForm()" method="post">
                <input class="form-input" placeholder="Email" type="text" name="user"><br>
                <input class="form-input" placeholder="Password" type="password" name="password"><br>
                <button id="login-button" type="submit" name="btnSubmit">Login</button>
            </form>

<!-- php part *************************************************************************************** -->
        <?php
            require 'config.php';
            

            if(isset($_POST['btnSubmit']))
            {
                $email = $_POST['user'];
                $password = $_POST['password'] ;

                $sql = "SELECT * FROM members WHERE email = '$email' AND password = '$password'";
                $sql2 = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
                $result = $conn->query($sql);
                $result2 = $conn->query($sql2);
                if ($result-> num_rows == 1)
                {
                    while($row = $result-> fetch_assoc())
                    {
                        $_SESSION['AccType'] = "member";
                        $_SESSION['memberId'] = $row['id'];
                        $_SESSION['userName'] = $row['user_name'];
                        header("Location: http://localhost/all/Member/getService.php");
                    }
                }
                else if ($result2-> num_rows == 1)
                {
                    while($row = $result2-> fetch_assoc())
                    {
                        $_SESSION['AccType'] = "admin";
                        $_SESSION['memberId'] = $row['id'];
                        $_SESSION['userName'] = $row['user_name'];
                        header("Location: http://localhost/all/admin/Admin.php");
                    }
                }
                else{
                    ?> <p style="color:red;">Invaild email or password </p><br> <?php
                }
            
            }  
            $conn-> close(); 
        ?>
<!-- end of php part ******************************************************************************************** -->

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
            <h3>Follow us:</h3>
            <P>
                <a href=" "><img src="images/fac.png" width="100 "></a>
                <a href=" "><img src="images/ins.png" width="100 "></a>
                <a href=" "><img src="images/twi.png" width="100 "></a>
            </P>
        </div>
    </div>

</body>

</html>
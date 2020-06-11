<!DOCTYPE html>
<html>

<?php
    session_start();

    if (isset($_SESSION['AccType'])) 
    {
        $type = $_SESSION['AccType'];

        if ($type == "member") { 
            header("Location: http://localhost/all/Member/getService.php");
            die("hello");
        }
        
    }
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
    <title>Online Personal Counselling</title>
    <link href="Registation_style.css" rel="stylesheet">
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
        <li><a class="nav-item" href="My account.php">My account</a></li>
        <li><a id="cho-item" href="Registation.php">Register</a></li>
        <li><a class="nav-item" href="About.php">About us</a></li>
    </ul>

    <!--Body-->

    <div id="back-img">
        <div id="form-back">
            <h2>Registeration</h2>
            <form action="success.php" name="myForm" onsubmit="return validateForm()" method="post">
                First Name:
                <input id="first-name" placeholder="First Name" type="text" name="fname"> Last Name:
                <input id="last-name" placeholder="Last Name" type="text" name="lname"><br> E-mail:
                <input id="email" placeholder="E-mail Address" type="text" name="ymail"><br> Date of Birth:
                <input id="date" type="date" name="dat"><br> Country:
                <input id="coun" placeholder="Country" type="text" name="country"> Contact Number:
                <input id="cont" placeholder="Contact number" type="number" name="contact"><br> User Name:
                <input id="uname" placeholder="Username" type="text" name="uname"><br> Password:
                <input id="pass" placeholder="Password min charcter 7" type="password" name="pass"><br> C.Password:
                <input id="cpass" placeholder="Confirm Password" type="password" name="cpass"><br>
                <button id="signup" type="submit" name="btnSubmit">SIGN UP</button>
            </form>

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
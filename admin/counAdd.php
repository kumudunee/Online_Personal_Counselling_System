<?php ob_start();
?>

<head>
    <title>Online Personal Counselling</title>
    <script>
        function validateForm() {
            var a = document.forms["myForm"]["uname"].value;
            if (a == ""){
                alert("User Name must be Entered");
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

        #form-back{
            text-align:center;
        }

        #form-back h2{
            color:green;
        }
                
        #first-name {
        width: 30%;
        height: 30px;
        margin: 10px;
        padding: 0 5px;
        margin-left: 46px;
        border-color: black;
        }

        #last-name {
        width: 30%;
        height: 30px;
        margin: 10px;
        padding: 0 5px;
        margin-left: 46px;
        border-color: black;
        }

        #email {
            width: 30%;
            height: 30px;
            margin: 10px;
            padding: 0 5px;
            margin-left: 73px;
            border-color: black;
        }

        #cont {
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
            margin-left: 64px;
            padding: 0 5px;
            border-color: black;
        }

        #uname {
            width: 30%;
            height: 30px;
            margin: 10px;
            padding: 0 5px;
            margin-left: 45px;
            border-color: black;
        }

        #pass {
            width: 30%;
            height: 30px;
            margin: 10px;
            padding: 0 5px;
            margin-left: 55px;
            border-color: black;
        }

        #cpass {
            width: 30%;
            height: 30px;
            margin: 10px;
            padding: 0 5px;
            margin-left: 41px;
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

        body {
            margin: 0;
            padding-bottom: 10%;
            background-image: url("images/registerback.jpg");
            width: 100%;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

    </style>
</head>
<body>
<!-- get data form database to table  -->
    <?php 

        require 'config.php';      

        $id = $_POST["add"];
        

        $price = mysqli_query($conn,"SELECT * FROM coun_req WHERE id = $id");
        $result = mysqli_fetch_array($price);
        
    ?>

    <!-- form -->
    <div id="form-back">
            <h2>Add Counsellers</h2>
            <form name="myForm" onsubmit="return validateForm()" method="post">
                First Name:
                <input id="first-name" placeholder="First Name" type="text" name="fname" value="<?php echo $result["first_name"]; ?>"><br> Last Name:
                <input id="last-name" placeholder="Last Name" type="text" name="lname" value="<?php echo $result["last_name"]; ?>"><br> E-mail:
                <input id="email" placeholder="E-mail Address" type="text" name="ymail" value="<?php echo $result["email"]; ?>"><br> Country: 
                <input id="coun" placeholder="Country" type="text" name="country"value="<?php echo $result["country"]; ?>"><br> Contact Number:
                <input id="cont" placeholder="Contact number" type="number" name="contact"value="<?php echo $result["contact"]; ?>"><br> User Name:
                <input id="uname" placeholder="Username" type="text" name="uname"><br> Password:
                <input id="pass" placeholder="Password min charcter 7" type="password" name="pass"><br> C.Password:
                <input id="cpass" placeholder="Confirm Password" type="password" name="cpass"><br>
                <button id="signup" type="submit" name="btnSubmit">Submit</button>
            </form>

    </div>
</body>
<!-- send data to database(php part) ****************************************** -->
<?php 

    if (isset($_POST["btnSubmit"]))
        {
            $firstName = $_POST["fname"];
            $lastName = $_POST["lname"];
            $email = $_POST["ymail"];
            $country = $_POST["country"];
            $tele = $_POST["contact"];
            $userName = $_POST["uname"];
            $pass = $_POST["cpass"];


            $sql = "INSERT INTO `counsellers`(`first_name`, `last_name`, `email`, `country`, `contact`, `user_name`, `password`) VALUES 
                ('$firstName','$lastName','$email','$country',$tele,'$userName','$pass')";


            if($conn->query($sql)) { 
                header('Location: http://localhost/all/admin/counRequest.php');
                ob_enf_fluch();               
            }else 
            { ?>
                <h1>Update Fail</h1>
            <?php 
                echo $conn->error;
            }   

            mysqli_close($conn);
        }
?>
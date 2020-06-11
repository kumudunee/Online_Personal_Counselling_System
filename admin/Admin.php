<!DOCTYPE html>
<html>

<?php
    session_start();
?>

<head>
    <title>Online Personal Counselling</title>
    <link rel="stylesheet" href="Accounts_style.css" type="text/css">

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            color: black;
            font-family: "Arial", Helvetica, sans-serif;
            font-size: 17px;
            text-align: left;
        } 
        th {
            background-color: black;
            color: white;
            padding-left:14px;

        }
        tr:nth-child(even) {background-color: #f2f2f2}
        td{
            padding-left:15px;
        }
        #add {
            height: 30px;
            margin-top: 0px;
            background-color: green;
            border-color: black;
            color: white;
            border-radius: 4px;
        }

        #add:hover {
            color: green;
            background-color: white;
            border: 2px solid green;
        }

        #btnDelete{
            height: 25px;
            margin-top: 0px;
            background-color: #ff0000;
            border-color: black;
            color: white;
            border-radius: 4px;
        }

        #btnDelete:hover {
            color: #ff0000;
            background-color: white;
            border: 2px solid #ff0000;
        }

        #main-body {
            margin: 0;
            padding-bottom: 20%;
            background-image: url("images/registerback.jpg");
            width: 100%;
            height: 400px;
            background-size: cover;
            background-position: center;
        }
    </style>

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
    <div id="main-body">
        <div id="user">
            <h1>Hello,  <?php echo $_SESSION['userName']; ?></h1>

            <!-- log out button -->
            <form style="display:inline-block; float:right;" method="post"><button id="out" name="out">LOG OUT</button></form>
            <?php
                if(isset($_POST['out']))
                {
                    session_destroy();
                    header("Location: http://localhost/all/My account.php");
                }
            ?>
        </div>

        <!-- user   Navigation bar  -->
        <div id="user-navi">
            <li><a id="user-navi-choose" href="Admin.php">Administrators</a></li>
            <li><a class="user-navi-item" href="Members.php">Members</a></li>
            <li><a class="user-navi-item" href="Counsellers.php">Counsellers</a></li>
            <li><a class="user-navi-item" href="Service.php">Service</a></li>
            <li><a class="user-navi-item" href="Invite.php">Invite</a></li>
            <li><a class="user-navi-item" href="counRequest.php">Coun. Request</a></li>

        </div>
        <div style="display: inline-block; padding-left: 10%;">
            
        <!-- administators table -->
            <table>
                <caption>Administrators</caption>
                <tr>
                    <th>ID </th>
                    <th>Name </th>
                    <th>Email </th>
                    <th>Telephone </th>
                    <th>User Name </th>
                    <th>Password </th>
                    <th>Delete</th>
                </tr>
        <!-- get data form database to table (php part) ****************************************** -->
                <?php
                    require 'config.php';

                    $sql = "SELECT id, name, email, tele, user_name, password FROM Admin";
                    $result = $conn-> query($sql);

                    if($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo "<tr><td>". $row["id"] ."</td><td>". $row["name"] ."</td><td>". 
                            $row["email"] ."</td><td>". $row["tele"] ."</td><td>". $row["user_name"]
                            ."</td><td>". $row["password"] ."</td><td>";
                            ?> <form method="post" action="delete.php">
                                <input type="hidden" name="table" value="admin">
                                <input type="hidden" name="delete" value="<?php echo $row["id"]; ?>">
                                <button type="submit" id="btnDelete">Delete</button>
                           </form> </td></tr> <?php

                        }
                        echo "</table>";
                    }
                    else {
                        echo "0 result";
                    }
                    $conn-> close();
                ?>
        <!-- end of php part ***********************************************************8 -->
                <br>
                <a href="adminUpdate.php"><button id="add">Add New</button></a>
            </table>

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
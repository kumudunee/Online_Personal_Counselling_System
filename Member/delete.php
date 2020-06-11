<?php 

    require 'config.php';

    $delete = $_POST['delete'];
    $table = $_POST['table'];

    $sql = "DELETE FROM $table WHERE id = $delete " ;

    if($conn->query($sql)) { 
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }else 
    { ?>
        <h1>Delete Fail</h1>
    <?php 
        echo $conn->error;
    }   

    mysqli_close($conn);
?>

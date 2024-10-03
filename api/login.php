<?php

include("connect.php");
session_start();
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$role = $_POST['role'];

   






 $check = mysqli_query($connect,"SELECT * FROM user WHERE mobile='$mobile'AND password='$password'AND role='$role'");

//print_r($check); die;

    if (mysqli_num_rows($check)>0){
        $userdata = mysqli_fetch_array($check);
        //print_r($userdata); die;
        $groups = mysqli_query($connect,"SELECT * FROM user WHERE role=2");
        $groupdata = mysqli_fetch_all($groups,MYSQLI_ASSOC);

        //print_r($groupdata); die;

        $_SESSION['userdata'] = $userdata;
        $_SESSION['groupdata'] = $groupdata;    

        if(isset($_SESSION['userdata']) && isset($_SESSION['groupdata']))
        {
            echo '
            <script>
            
            window.location = "../routes/dashboard.php";
            </script>
            ';         
        }
        else {
            echo "lkdsjkl";
        }
        
    }
    else {
        echo '
        <script>
        alert("Credentials invalid,Kindly try again.");
        window.location = "../";
        </script>
        ';
    }

?>

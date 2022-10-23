<?php
session_start();
?>
<?php
include 'conn.php';

if (isset($_GET['Token'])) {
    $token = $_GET['Token'];

    // $updatequery = "UPDATE usersdata SET Status = 'active' WHERE Token = '$token'";
    // $result = mysqli_query($connect, $updatequery);

    // if ($result) {
        if (isset($_SESSION['msg'])) {
            $_SESSION['msg'] = "Account Vertified !";
            header("location:login.php");
        } else {
            $_SESSION['msg'] = "You're Logged Out !";
            header("location:login.php");
        }
    }
    else {
    $_SESSION['msg'] = "Account not Vertified !";
     header("location:signup.php");
}
?>
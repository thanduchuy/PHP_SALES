<?php
include "control/connectDB.php";
$nameRe = $passRe = $repassRe = $errorRe = '';
$nameLg = $passLg = $errorLg = '';
$user = "";
function registerUser()
{
    global $nameRe;
    global $passRe;
    global $repassRe;
    global $errorRe;
    if (isset($_POST['btnRegister'])) {
        $nameRe = $_POST['name'];
        $passRe = $_POST['password'];
        $repassRe = $_POST['rePassword'];
        if (empty($nameRe) || empty($passRe) || empty($repassRe)) {
            $errorRe = "Không được bỏ trống trường nào.";
        } else {
            if (strlen($passRe) < 6) {
                $errorRe = "Mật khẩu phải lớn hơn 6 ký tự";
            } else {
                if ($passRe == $repassRe) {
                    if (checkAccount($nameRe, $passRe) > 0) {
                        $errorRe = "Tài khoản đã tồn tại";
                    } else {
                        createAccount($nameRe, $passRe);
                    }
                } else {
                    $errorRe = "Mật khẩu nhập lại không đúng";
                }
            }
        }
    }
}
function checkAccount($name, $pass)
{
    global $conn;
    global $user;
    $sql = "SELECT * FROM `user` WHERE name='$name' AND pass='$pass'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    $u = mysqli_fetch_assoc($result);
    if ($num > 0) {
        $user = $u['name'];
    }
    return $num;
}
function createAccount($name, $pass)
{
    global $conn;
    $sql = "INSERT INTO `user`(`name`, `pass`)
    VALUES('$name', '$pass')";
    mysqli_query($conn, $sql);
    if (mysqli_query($conn, $sql)) {
        header('Location:login.php');
    }
}
function loginAccount()
{
    global $nameLg;
    global $passLg;
    global $errorLg;
    global $user;
    if (isset($_POST['btnLogin'])) {
        $nameLg = $_POST['nameLg'];
        $passLg = $_POST['passwordLg'];
        if (empty($nameLg) || empty($passLg)) {
            $errorLg = "Không được bỏ trống trường nào.";
        } else {
            if (checkAccount($nameLg, $passLg) > 0) {
                $_SESSION['user'] = $user;
                header('Location:index.php');
            } else {
                $errorLg = "Tài khoản hoặc mật khẩu không đúng";
            }
        }
    }
}

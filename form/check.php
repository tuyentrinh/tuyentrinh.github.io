<?php


session_start();
$flag = true;
$pattern = '/^[a-z0-9]$/';
if (isset($_POST['email'],$_POST['username'],$_POST['password'],$_POST['repeat-password'])){
//    check email
    if (!preg_match($pattern,$_POST['email'])){
        $flag = false;
        $_SESSION['wrong_email'] = 'sai dinh dang email';
        header('Location:http://localhost/form/');
    }

    if(!preg_match($pattern,$_POST['username'])){
        $flag = false;
        $_SESSION['wrong_username'] = 'sai dinh dang username';
        header('Location:http://localhost/form/');
    }

    if(!preg_match($pattern,$_POST['password'])){
        $flag = false;
        $_SESSION['wrong_pass'] = 'sai dinh dang pass';
        header('Location:http://localhost/form/');
    }else{
        if($_POST['password'] != $_POST['repeat-password']){
            $flag = false;
            $_SESSION['wrong_repeat'] = 'Nhap lai sai pass';
            header('Location:http://localhost/form/');
        }
    }
    if (preg_match($pattern,$_POST['email']) && preg_match($pattern,$_POST['username']) && preg_match($pattern,$_POST['password'])){
        if ($_POST['password'] == $_POST['repeat-password']){
            echo "dang ki thanh cong";
        }
    }


}
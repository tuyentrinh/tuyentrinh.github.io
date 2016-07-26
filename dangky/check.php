<?php


session_start();
$so='/^[a-zA-z0-9]{6,32}$/';
$database = new PDO("mysql:host=localhost;dbname=dangky","root","");
$database -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
if($_SERVER['REQUEST_METHOD']== "POST"){
   $loi = array();
    $_POST['username'] = trim($_POST['username']);
    $_POST['password'] = trim($_POST['password']);
    $_POST['email'] = trim($_POST['email']);
    $_SESSION['sess_username'] = $_POST['username'];
    $_SESSION['sess_email'] = $_POST['email'];
    $_SESSION['sess_password'] = $_POST['password'];
}
if(isset($_POST['username'])) {
    if (strlen($_POST['username']) < 6 || strlen($_POST['username']) > 32) {
    }else{
        if(preg_match($so,$_POST['username'])){
            $sql = "SELECT username FROM dangky WHERE username = '$_POST[username]'";
            $stmt = $database->query($sql);
            $stmt->execute();
            $exist_username = $stmt->rowCount();
            if($exist_username > 0 ){
                $loi[]='username';
                $_SESSION['exist_name'] = "nick name này đã tồn tại!";
            }else{
                $_SESSION['temp'] = "tên đăng nhập hợp lệ nhé!";
            }
        }else{
            $loi[]='wrong1';
            $_SESSION['wrong_name_pattern']= "Tên không chứa các kí tự đặc biệt!";
        }
    }

}
//xử lý con email
if(isset($_POST['email'])){
    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $sql = " SELECT email FROM dangky WHERE email = '$_POST[email]'";
        $stmt =  $database -> query($sql);
        $stmt -> execute();
        $exist_email = $stmt->rowCount();
        if($exist_email > 0){
            $loi[]="email";
            $_SESSION['exist_email'] = 'email này đã được sử dụng!';
        }else{
            $_SESSION['email'] = 'sử dụng email thành công!';
        }
    }else{
        $loi[]='wrong2';
        $_SESSION['wrong_email'] = "email bạn dùng không hợp lệ!";
    }
}
if(isset($_POST['password'])){
    if(strlen($_POST['password']) < 6 || strlen($_POST['password']) > 32 ){
        $_SESSION['wrong_pass_length'] = "Mật khẩu từ 6 đến 32 kí tự!";
        $loi[]="wrong_pass";
    }else{
        if(preg_match($so,$_POST['password'])){
            $_SESSION['pass'] = "Mật khẩu dùng thành công!";
        }else{
            $_SESSION['wrong_pass'] = "Mật khẩu không chứa các kí tự đặc biệt!";
            $loi[]="wrong3";
        }
    }
}

if(isset($_POST['repeat_password'])){
    if($_POST['repeat_password'] == $_POST['password']){
    $_SESSION['repeat'] = "Nhập lại mật khẩu chính xác!";
}else{
    $_SESSION['wrong_repeat']="Xác nhận mật khẩu không đúng!";
        $loi[]='wrong4';
    }

};

if($loi == NUll){
    header("location:http://localhost:81/phpmyadmin/");
    $sql = "INSERT INTO dangky(email,username , password)
   VALUES ($_POST[email],$_POST[username],$_POST[psssword])";
}
else{
    header("Location:http://localhost:81/dangky/");
}




?>




































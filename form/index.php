<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-2.2.4.js"
            integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="assets/js/script.js" type="text/javascript"></script>
</head>
<body>

<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
    <h1>Material Login Form</h1><span>Bài tập của Nghĩa <i class='fa fa-code'></i> by <a
            href='https://github.com/nghiatv'>Nghĩa Thân</a></span>
</div>
<div class="rerun"><a href="">Rerun Pen</a></div>
<div class="container">
    <div class="card"></div>
        <div class="card">
            <div class="toggle"></div>
            <h1 class="title">ĐĂNG KÝ
                <div class="close"></div>
            </h1>
            <form action="check.php" method="post">
                <div class="input-container">
                    <input type="text" id="email" required="required" name="email" value=""/>
                    <label for="email">Email</label>
                    <div class="bar"></div>
                    <div class="error">
                        <?php
                            if(isset($_SESSION['wrong_email'])){
                                echo $_SESSION['wrong_email'];
                            }
                        ?>
                    </div>

                </div>
                <div class="input-container">
                    <input type="text" id="Username" required="required" name="username" value=""/>
                    <label for="Username">Username</label>
                    <div class="bar"></div>
                    <div class="error">
                        <?php
                        if(isset($_SESSION['wrong_username'])){
                            echo $_SESSION['wrong_username'];
                        }
                        ?>
                    </div>

                </div>
                <div class="input-container">
                    <input type="password" id="Password" required="required" name="password" value=""/>
                    <label for="Password">Password</label>
                    <div class="bar"></div>
                    <div class="error">
                        <?php
                        if(isset($_SESSION['wrong_pass'])){
                            echo $_SESSION['wrong_pass'];
                        }
                        ?>
                    </div>
                </div>
                <div class="input-container">
                    <input type="password" id="Repeat Password" required="required" name="repeat-password" value=""/>
                    <label for="Repeat Password">Repeat Password</label>
                    <div class="bar"></div>
                    <div class="error">
                        <?php
                        $pattern='/^[a-zA-Z0-9]{6,32}$/';
                        if (isset($_POST['repeat-password'])){
                            if($_POST['password'] != $_POST['repeat-password']){
                                echo "NHẬP LẠI MẬT KHẨU ĐI THẰNG NGU!";
                            };
                        };

                        ?>
                    </div>

                </div>
                <div class="button-container">
                    <button><span>Next</span></button>
                </div>
            </form>
            </div>
    <?php

//    $user = array('username' => "ahihi",
//        'password' => "docho");
//
//    if($user['username'] == $_POST['username'] && $user['password']== $_POST['password'])
//     echo "nhập đúng";
//         else
//        echo "nhập sai";


    $pattern='/^[a-zA-Z0-9]{6,32}$/';
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repeat-password'])){
        if($_POST['password'] != $_POST['repeat-password']){

            if(preg_match($pattern,$_POST['username'])){
                if(preg_match($pattern,$_POST['password'])){
                    echo "ĐĂNG NHẬP THÀNH CÔNG!"."<br/>";
                    setcookie('cname',$_POST['username'],time()+3000);
                    setcookie('cpass',$_POST['password'],time()+3000);
                    setcookie('cemail',$_POST['email'],time()+3000);
                    echo $_COOKIE['cname'];
                  session_start();
                    $_SESSION['sname']= $_POST['username'];
                    $_SESSION['spass']= $_POST['password'];
                    $_SESSION['semail']= $_POST['email'];
                }
        };}};
    ?>
</div>
</body>
</html>
<?php
session_destroy();
?>
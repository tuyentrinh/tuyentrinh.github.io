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

<div class="pen-title">
    <h1>Material Login Form</h1><span>Bài tập của Nghĩa <i class='fa fa-code'></i> by <a
            href='https://github.com/nghiatv'>Nghĩa Thân</a></span>
</div>
<div class="rerun"><a href="">Rerun Pen</a></div>
<div class="container">
    <div class="card"></div>
        <div class="card">
            <div class="toggle"></div>
            <h1 class="title">Register
                <div class="close"></div>
            </h1>
            <form action="check.php" method="post">
<!--                //xử lý email*/-->
                <div class="input-container">
                    <input type="text" id="email" required="required" name="email" value=""/>
                    <label for="email">Email</label>
                    <div class="bar"></div>
                    <div class="error">
                        <?php
                        if(isset($_SESSION['wrong_email'])){
                            echo $_SESSION['wrong_email'];
                        }
                        if(isset($_SESSION['exist_email'])){
                            echo $_SESSION['sess_email']."<br/>".$_SESSION['exist_email'] ;
                        }
                        ?>
                    </div>

                </div>



<!--                /* xử lý username*/-->
                <div class="input-container">
                    <input type="text" id="Username" required="required" name="username" value=""/>
                    <label for="Username">Username</label>
                    <div class="bar"></div>
                    <div class="error">
                        <?php
                        if(isset($_SESSION['wrong_name_length'])){
                            echo $_SESSION['wrong_name_length'];}
                        if(isset($_SESSION['wrong_name_pattern'])){
                            echo $_SESSION['wrong_name_pattern'];
                        }
                        if(isset($_SESSION['exist_name'])){
                            echo $_SESSION['exist_name'];
                        }
                        if(isset($_SESSION['temp'])){
                            echo 'chào mừng bạn '.$_SESSION['temp'].'!';
                        }
                        ?>
                    </div>

                </div>




<!--                /*xử lý password*/-->
                <div class="input-container">
                    <input type="password" id="Password" required="required" name="password" value=""/>
                    <label for="Password">Password</label>
                    <div class="bar"></div>
                    <div class="error">
                        <?php
                        if(isset($_SESSION['pass'])){
                            echo $_SESSION['pass'];
                        }
                        if(isset($_SESSION['wrong_pass_length'])){
                            echo $_SESSION['wrong_pass_length'];
                        }
                        if(isset( $_SESSION['wrong_pass'])){
                            echo  $_SESSION['wrong_pass'];
                        }
                          ?>
                    </div>
                </div>



<!--                /* xử lý repeat-password*/-->
                <div class="input-container">
                    <input type="password" id="Repeat Password" required="required" name="repeat_password" value=""/>
                    <label for="Repeat Password">Repeat Password</label>
                    <div class="bar"></div>
                    <div class="error">
                        <?php
                        if(isset($_SESSION['wrong_repeat'])){
                            echo $_SESSION['wrong_repeat'];
                        }
                        if(isset($_SESSION['repeat'])){
                            echo $_SESSION['repeat'];
                        }
                        ?>

                    </div>

                </div>



                <div class="button-container">
                    <button><span>Next</span></button>
                </div>
            </form>
        </div>
</div>
</body>
</html>
<?php
session_destroy();
?>
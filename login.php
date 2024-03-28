<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ورود به حساب کاربری</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/fontawesome-free-6.4.2-web/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.rtl.min-v5.0.2.css">
    <script src="js/bootstrap.bundle.min-v5.3.2.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" media="screen and (min-width: 768px)" href="css/widescreen.css">
    <link rel="stylesheet" media="screen and (max-width: 600px)" href="css/smallscreen.css">
</head>
<body>
<div>
<div class="container" id="login-form">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <img src="images/page_content/car3.png" alt="" id="logo-image">
            </div>
            <div class="card-body">
                <form action="barasi-login.php" method="post">
                    <!--
                    نمونه کنترل های بوت استرپ
                    https://getbootstrap.com/docs/5.0/forms/input-group/
                    -->
                    <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-user"></i>
                            </span>
                        <input type="text" class="form-control"
                               aria-label="Username" aria-describedby="basic-addon1"
                               id="user_name" placeholder="نام کاربری"
                               name="user_name" required value="parsa">
                    </div>
                    <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon2">
                                <i class='fas fa-key'></i>
                            </span>
                        <input type="password" class="form-control"
                               aria-label="Username" aria-describedby="basic-addon1"
                               name="password" id="password"
                               placeholder="گذرواژه" required value="123">
                    </div>

                    <h6>نقش خود را انتخاب کنید:</h6>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio1" name="role" value="student" onclick="f1('student')">
                        <label class="form-check-label" for="radio1">دانش آموز</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio2" name="role" value="teacher"  onclick="f1('teacher')">
                        <label class="form-check-label" for="radio2">معلم</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio3" name="role" value="manager" checked  onclick="f1('manager')">
                        <label class="form-check-label" for="radio3">مدیر سایت</label>
                    </div>







                    <div class="form-group">
                        <input type="submit" value="ورود" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
</div>
</div>
<script>
    //var is_test = false;
    var is_test = true;

    function f1(user) {
        if (is_test == true) {
            if (user == 'manager') {
                document.querySelector('#user_name').value = "parsa";
                document.querySelector('#password').value = "123";
            }
            if (user == 'teacher') {
                document.querySelector('#user_name').value = "ali";
                document.querySelector('#password').value = "321";
            }
            if (user == 'student') {
                document.querySelector('#user_name').value = "reza";
                document.querySelector('#password').value = "111";
            }
        }
    }

</script>

</body>
</html>
<?php

?>
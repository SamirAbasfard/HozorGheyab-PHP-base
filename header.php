<?php
//session_start();

$titil1 = "سامانه حضور و غیاب -";
if(isset($GLOBALS['titlepage'])){
    $title2 = $GLOBALS['titlepage'];
    $title = $titil1 . $title2;
}
else{
    $title = $titil1;
}

function site_url(){
    return sprintf(
        "%s://%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME']
    );
}

$my_site_dir = "hozor-gheyab";
$site_url = site_url()."/".$my_site_dir;
$url_assets = $site_url."/assets/";
$url_admin = $site_url."/admin/";
//echo $url_assets;
//die();
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $url_assets; ?>fonts/fontawesome-free-6.4.2-web/css/all.css">

 <link rel="stylesheet" href="<?php echo $url_assets; ?>css/bootstrap.rtl.min-v5.0.2.css">
    <script src="<?php echo $url_assets; ?>js/bootstrap.bundle.min-v5.3.2.js"></script>
    <script src="<?php echo $url_assets; ?>js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="<?php echo $url_assets; ?>css/style.css">
    <link rel="stylesheet" media="screen and (min-width: 768px)" href="<?php echo $url_assets; ?>css/widescreen.css">
    <link rel="stylesheet" media="screen and (max-width: 600px)" href="<?php echo $url_assets; ?>css/smallscreen.css">
    <title> <?php echo $title; ?></title>
</head>

<body>
<section id="fullpage" class="col-">
    <header>
        <div class="container-fluid mt-3">
            <div class="row widescreen-row">
                <div class="col-sm-4 p-3 ">
                    <a class="" href="index.php"><img src="images/page_content/logo2.png" alt=""></a>
                </div>
                <div class="col-sm-4 p-3 img01" id="shoir">
                    <img src="images/Slogan/00001.jpg">
                </div>
                <div class="col-sm-4 p-3 ">
                    <a href="pages/about-us.php" class="btn btn-primary btn-sm">راهنما</a>

                    <?php
                    if (isset($_SESSION['user_logged'])) {
                        $user_logged = $_SESSION['user_logged'];
                        ?>
                        <div class="btn-group">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="fa fa-user"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <!--                                    <a class="dropdown-item" href="#">خروج</a>-->
                                    <form action='index.php' method='post'>
                                        <input type='hidden' name='logout' value='logout'>
                                        <button class="dropdown-item" type='submit'>خروج از حساب کاربری</button>
                                    </form>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary">
                                <?php echo $user_logged['firstname'] . ' ' . $user_logged['lastname']; ?>
                            </button>
                        </div>


                        <?php
                    }
                    if (!(isset($_SESSION['user_logged']))) {
                        ?>

                        <div class="btn-group ">
                            <a href="login.php" class="btn btn-primary btn-sm">ورود</a>
                            <a href="register2.html" type="button" class="btn btn-primary btn-sm">ثبت نام</a>
                        </div>
                        <?php
                    }


                    else{
                        $r =  $_SESSION['user_role'];
                        if ($r=="manager"){
                            $href = "admin\manager-dashboard.php";
                        }

                        elseif ($r=="teacher"){
                            $href = "teacher/teacher-dashboard.php";
                        }

                        elseif ($r=="student"){
                            $href = "student\student-dashboard.php";
                        }

                        ?>
                        <a href="<?php echo "$href";?>" class="btn btn-primary btn-sm">داشبورد</a>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>


        <nav class="navbar navbar-expand-sm bg-primary navbar-dark">

            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="images/page_content/logo2.png" alt=""></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
        </nav>

    </header>

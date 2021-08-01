<?php include($_SERVER['DOCUMENT_ROOT'].'/list/lib/lib.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/list/css/style.css">
</head>
<body>
    <header>
        <div class="wrap">
            <div id="logo" onclick="location.href='/list/index.php'" style="font-size: 20px; font-weight:bold">
                Logo
            </div>
            <nav>
                <?php if(isset($_SESSION['id'])){ ?>

                    <a style="font-size: 18px;" class="name">사용자:<?php echo $_SESSION['name']; ?></a>
                    <a style="font-size: 18px;" href="/list/page/logout.php">로그아웃</a>
                    
                <?php } else { ?>

                    <a style="font-size: 18px;" href="/list/page/member.php">회원가입</a>
                    <a style="font-size: 18px;" href="/list/page/login.php">로그인</a>

                <?php } ?>
            </nav>
        </div>
    </header>
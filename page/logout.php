<?php include($_SERVER['DOCUMENT_ROOT'].'/list/lib/lib.php'); ?>
<?php 

    session_destroy();
    alert("로그아웃 되었습니다.");
    first_page();

?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/list/lib/header.php'); ?>
    <div class="wrap"><h2>수정</h2></div>
    <?php 

        $idx = $_GET['idx'];
        $sql = "select * from board where idx = '$idx'";
        $result = mysqli_query($GLOBALS['s'],$sql);
        $data = mysqli_fetch_array($result);

        if($_POST){
            $sql = "update board set title = '$title', con = '$con' where idx = '$idx'";
            mysqli_query($GLOBALS['s'],$sql);
            alert("수정되었습니다.");
            first_page();
        }

    ?>
    <section id="modify">
        <div class="wrap">
            <form action="<?php echo $curl; ?>" method="post">
                <table>
                    <tr>
                        <td>작성자</td>
                        <td><input type="text" name="name" value="<?php echo $data['name']; ?>"></td>
                    </tr>
                    
                    <tr>
                        <td>제 목</td>
                        <td><input type="text" name="title" value="<?php echo $data['title']; ?>"></td>
                    </tr>
    
                    <tr>
                        <td>내 용</td>
                        <td><textarea name="con"><?php echo $data['con']; ?></textarea></td>
                    </tr>
    
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="완료" onclick="location.href='/list/page/modify.php'">
                            <input type="button" value="취소" onclick="history.back();">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </section>
<?php include($_SERVER['DOCUMENT_ROOT'].'/list/lib/footer.php'); ?>
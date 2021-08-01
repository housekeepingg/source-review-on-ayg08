<?php include($_SERVER['DOCUMENT_ROOT'].'/list/lib/header.php'); ?>
    <div class="wrap"><h2>글보기</h2></div>
    <?php 

        $idx = $_GET['idx'];
        $sql = "select * from board where idx = '$idx'";
        $result = mysqli_query($GLOBALS['s'],$sql);
        $data = mysqli_fetch_array($result);

    ?>
    
    <section id="view">
        <div class="wrap">
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
                        <input type="button" value="수정" onclick="location.href='/list/page/modify.php?idx=<?php echo $data['idx']; ?>'">
                        <input type="button" value="확인" onclick="location.href='/list/index.php'" >
                    </td>
                </tr>
            </table>
        </div>
    </section>
<?php include($_SERVER['DOCUMENT_ROOT'].'/list/lib/footer.php'); ?>
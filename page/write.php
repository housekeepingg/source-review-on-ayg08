<?php include($_SERVER['DOCUMENT_ROOT'].'/list/lib/header.php'); ?>
    <div class="wrap"><h2>글쓰기</h2></div>
    <?php 

        if($_POST){
            $sql = "insert into board(name,title,con,date) values('$name','$title','$con',now())";
            mysqli_query($GLOBALS['s'],$sql);
            alert("글작성이 완료되었습니다.");
            first_page();
        }
    ?>

    <section id="write">
        <div class="wrap">
            <form action="<?php echo $curl; ?>" method="post">
                <table>
                    <tr>
                        <td>작성자</td>
                        <td><input type="text" name="name" readonly="readonly" value="<?php echo $_SESSION['name']; ?>"></td>
                    </tr>
        
                    <tr>
                        <td>제목</td>
                        <td><input type="text" name="title" required="required"></td>
                    </tr>
        
                    <tr>
                        <td>내용</td>
                        <td><textarea name="con" required="required"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit">
                            <input type="button" value="취소" onclick="location.href='/list/index.php'">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </section>
<?php include($_SERVER['DOCUMENT_ROOT'].'/list/lib/footer.php'); ?>

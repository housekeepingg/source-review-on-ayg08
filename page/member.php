<?php include($_SERVER['DOCUMENT_ROOT'].'/list/lib/header.php'); ?>
    <div class="wrap"><h2>회원가입</h2></div>
<?php

    if($_POST){
        $sql = "select * from member where id = '$id'";
        $result = mysqli_query($GLOBALS['s'],$sql);
        $num = mysqli_num_rows($result);
        
        if($num > 0){
            alert("이미 가입된 아이디입니다.");
            first_page();
        } else {
            alert("회원가입에 성공하셨습니다.");
            $sql = "insert into member(id,pw,name,phone) values('$id',password('$pw'),'$name','$phone')";
            mysqli_query($GLOBALS['s'],$sql);
            first_page();
        }
    }

?>
    
    <section id="member">
        <form action="<?php echo $curl; ?>" method="post">
            <div class="wrap">
                <table>
                    <tr>
                        <td>아이디</td>
                        <td><input type="text" name="id" placeholder="아이디" required="required" ></td>
                    </tr>

                    <tr>
                        <td>비밀번호</td>
                        <td><input type="password" name="pw" placeholder="비밀번호" required="required"></td>
                    </tr>
                    
                    <tr>
                        <td>이름</td>
                        <td><input type="text" name="name" placeholder="이름" required="required"></td>
                    </tr>

                    <tr>
                        <td>전화번호</td>
                        <td><input type="text" name="phone" placeholder="전화번호" required="required"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit"></input>
                        </td>
                    </tr>
                </table>
            </div>       
        </form>
    </section>
    
<?php include($_SERVER['DOCUMENT_ROOT'].'/list/lib/footer.php'); ?>
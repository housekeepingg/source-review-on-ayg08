<?php include($_SERVER['DOCUMENT_ROOT'].'/list/lib/header.php'); ?>
    <div class="wrap"><h2>로그인</h2></div>
<?php

    if($_POST){
        $sql = "select * from member where id='$id' and pw=password('$pw')";
        $result = mysqli_query($GLOBALS['s'],$sql);
        $num = mysqli_num_rows($result);
        
        if($num == 0){
			alert("아이디 또는 비밀번호를 확인해 주세요.");
			back();
		}else{
            $data = mysqli_fetch_array($result);
            
            $_SESSION['id'] = $data['id'];
            $_SESSION['name'] = $data['name'];
            
            alert("로그인되었습니다.");
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
                        <td><input type="text" name="id" placeholder="아이디"></td>
                    </tr>

                    <tr>
                        <td>비밀번호</td>
                        <td><input type="password" name="pw" placeholder="비밀번호"></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2">
                            <button type="submit">전송버튼</button>
                        </td>
                    </tr>
                </table>
            </div>       
        </form>
    </section>
    
<?php include($_SERVER['DOCUMENT_ROOT'].'/list/lib/footer.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/list/lib/header.php'); ?>
    
	<div class="wrap" style="display: flex; justify-content: space-between;">
		<h2>HOME</h2>
		<button onclick="location.href='/list/page/write.php'">글쓰기</button>
	</div>

    <?php
		if(isset($_GET['search'])){
			$search = $_GET['search'];
		}else{
			$search = "";
		}
	?>

    <?php 

        // for($i=1; $i<=100; $i++){
        //     $idx = $i;
        //     $title = '제목'.$i;
        //     $name = '작성자'.$i;
        //     $sql = "insert into board(idx,title,name,date) values('$idx','$title','$name',now())";
        //     echo $sql;
        //     mysqli_query($GLOBALS['s'],$sql);
        // }
    
    ?>

	<section id="list">
		<div class="wrap">
			
			<div style="margin-bottom: 30px;">
				<form method="get" action="/list/index.php">
					<input type="text" name="search" value="<?php echo $search;?>">
					<input type="submit" value="search">
				</form>
			</div>
			
			<table>			
				<tr>
					<th>번 호</th>
					<th>제 목</th>
					<th>작성자</th>
					<th>작성일</th>
				</tr>

				<?php
                    $sql = "select * from board where title like('%{$search}%') or name like('%{$search}%') order by idx desc";
					$result = mysqli_query($GLOBALS['s'],$sql);
					$total = mysqli_num_rows($result);

					$list = 10;
					$page = isset($_GET['page']) ? $_GET['page'] : 1;

					$total_page = ceil($total/$list); 

					$start = ($page-1) * $list;

                    $sql = "select * from board where title like('%{$search}%') or name like('%{$search}%') order by idx desc limit {$start}, {$list}";
					$result = mysqli_query($GLOBALS['s'],$sql);


					$prev = $page == 1 ? $page : $page-1;
					$next = $page == $total_page ? $total_page : $page+1;

					while($data = mysqli_fetch_array($result)){
				?>

				<tr>
					<td><?php echo $data['idx'];?></td>
					<td><a href="/list/page/view.php?idx=<?php echo $data['idx'];?>"><?php echo hit($search,$data['title']);?></a></td>
					<td><?php echo hit($search,$data['name']);?></td>
					<td><?php echo $data['date'];?></td>
				</tr>
				<?php } ?>

				<tr>
					<td colspan="4">
						<button onclick="location.href='/list/index.php?page=<?php echo $prev;?>&search=<?php echo $search;?>'">이 전</button>
						<?php 
							for($i=1; $i<=$total_page; $i++){
						?>
							<button onclick="location.href='/list/index.php?page=<?php echo $i;?>&search=<?php echo $search;?>'"><?php echo $i;?></button>
						<?php } ?>
						<button onclick="location.href='/list/index.php?page=<?php echo $next;?>&search=<?php echo $search;?>'">다 음</button>
					</td>
				</tr>
			</table>
		</div>
	</section>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/list/lib/footer.php'); ?>
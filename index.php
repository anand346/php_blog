
<?php include "inc/header.php"; ?>
<?php include "inc/slider.php" ;?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		<!-- pagination -->

		<?php
		$per_page = 3;
		if(isset($_GET['page'])){
			$page = $db->link->real_escape_string(htmlentities($_GET['page']));		
		}else{
			$page = 1;
		}
		$start_from = ($page -1)*$per_page;
		?>

		<!-- pagination -->
		<?php
		$query = "SELECT * FROM tbl_post ORDER BY id DESC Limit $start_from,$per_page ";
		$post = $db->select($query);
		if($post){
			while($result = $post->fetch_assoc()){
		?>
			<div class="samepost clear">
				<h2><a href="post.php?id=<?php  echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
				<h4><?php  $fm->formatDate($result['date']);?>, By <a href="#"><?php echo $result['author'];?></a></h4>
				 <a href="post.php?id=<?php  echo $result['id'];?>"><img src="admin/upload/<?php echo $result['image'];?>" alt="post image"/></a>
				<?php  $fm->textShorten($result['body'],400) ;?>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id'];?>">Read More</a>
				</div>
			</div>
			<?php
		}
		$query = "SELECT * FROM tbl_post";
		$result = $db->select($query);
		$total_row = mysqli_num_rows($result);
		$total_page = ceil($total_row/$per_page);
		
		echo "<span class = 'pagination'><a href = 'index.php?page=1'>First Page</a>";
		for($i = 1;$i <= $total_page;$i++){
			echo "<a href = 'index.php?page={$i}'>{$i}</a>";
		}
		echo "<a href = 'index.php?page={$total_page}'>Last Page</a></span>";
		}else{
			header("location:404.php");
		}
			?>

		</div>
		<?php include "inc/sidebar.php";?>
		<?php include "inc/footer.php";?>
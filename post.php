<?php include "inc/header.php"?>
<?php
if(!isset($_GET['id']) OR $_GET['id'] == null){
	header("location:404.php");
}else{
	$id = $db->link->real_escape_string(htmlentities($_GET['id']));
}
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php
				$query = "SELECT * FROM tbl_post WHERE id = $id";
				$post = $db->select($query);
				if($post->num_rows > 0){
					$result = $post->fetch_assoc();
				?>
				<h2><?php echo $result['title'];?></h2>
				<h4><?php  $fm->formatDate($result['date']);?>, By <a href="#"><?php echo $result['author'];?></a></h4>
				<img src="admin/upload/<?php echo $result['image'];?>" alt="post image"/>
				<?php echo $result['body'];?>
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php
					$catid = $result['cat'];
					$queryRelated = "SELECT * FROM tbl_post WHERE  cat = $catid LIMIT 6";
					$catPosts = $db->select($queryRelated);
					if($catPosts){
					while($resultPost = $catPosts->fetch_assoc()){
					?>
					<a href="post.php?id=<?php echo $resultPost['id'];?>"><img src="admin/upload/<?php echo $resultPost['image'];?>" alt="post image"/></a>
					<?php 
						}
						}else{echo "no related post available";}
				 	?>
					<!-- <a href="#"><img src="images/post1.jpg" alt="post image"/></a>
					<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
					<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
					<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
					<a href="#"><img src="images/post1.jpg" alt="post image"/></a> -->
				</div>
	</div>
	<?php 
	}else{
		header("location:404.php");
	}
	 ?>

</div>
<?php include "inc/sidebar.php"?>
<?php include "inc/footer.php"?>
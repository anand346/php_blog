<?php include "inc/header.php" ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
        <?php
        if(!isset($_GET['category']) OR $_GET['category'] == null){
            header("location:404.php");
        }else{
            $catid = $db->link->real_escape_string(htmlentities($_GET['category']));
        }
		$query = "SELECT * FROM tbl_post WHERE cat = $catid";
		$post = $db->select($query);
		if($post){
			while($result = $post->fetch_assoc()){
		?>
        <div class="samepost clear">
				<h2><a href="post.php?id=<?php  echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
				<h4><?php  $fm->formatDate($result['date']);?>, By <a href="#"><?php echo $result['author'];?></a></h4>
				 <a href="post.php?"><img src="admin/upload/<?php echo $result['image'];?>" alt="post image"/></a>
				<?php  $fm->textShorten($result['body'],400) ;?>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id'];?>">Read More</a>
				</div>
			</div>
            <?php
            }
            }else{
                header("location:404.php");
            }   
            ?>
        </div>
        <?php include "inc/sidebar.php"?>
        <?php include "inc/footer.php"?>
    </div>

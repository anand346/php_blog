<?php include "inc/header.php" ?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
        <?php
        if(!isset($_GET['search']) OR $_GET['search'] == null){
            header("location:404.php");
        }else{
            $searchTerm = $db->link->real_escape_string(htmlentities($_GET['search']));
        }
		$query = "SELECT * FROM tbl_post WHERE title LIKE '%$searchTerm%' OR author LIKE '%$searchTerm%' OR body LIKE '%$searchTerm%'";
		$post = $db->select($query);
		if($post){
			while($result = $post->fetch_assoc()){
		?>
        <div class="samepost clear">
				<h2><a href="post.php?id=<?php  echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
				<h4><?php  $fm->formatDate($result['date']);?>, By <a href="#"><?php echo $result['author'];?></a></h4>
				 <a href="#"><img src="admin/upload/<?php echo $result['image'];?>" alt="post image"/></a>
				<?php  $fm->textShorten($result['body'],400) ;?>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id'];?>">Read More</a>
				</div>
			</div>
            <?php
            }
            }else{
                echo "your search is not found in author, description or title of any post";
            }   
            ?>
        </div>
        <?php include "inc/sidebar.php"?>
        <?php include "inc/footer.php"?>
    </div>

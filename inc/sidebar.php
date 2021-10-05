<div class="sidebar clear">

	<div class="samesidebar clear">
		<h2>Categories</h2>
		<ul>
			<?php
			$query = "SELECT * FROM tbl_category";
			$post = $db->select($query);
			if ($post) {
				while ($result = $post->fetch_assoc()) {
			?>
					<li><a href="posts.php?category=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></li>
			<?php
				}
			} else {
				echo "<li>No Category Created</li>";
			}
			?>
		</ul>
	</div>

	<div class="samesidebar clear">
		<h2>Latest articles</h2>
		<?php
		$queryLatest = "SELECT * FROM tbl_post ORDER BY id DESC LIMIT 5";
		$resultLatest = $db->select($queryLatest);
		if ($resultLatest) {
			while ($rowLatest = $resultLatest->fetch_assoc()) {
		?>
				<div class="popular clear">
					<h3><a href="post.php?id=<?php echo $rowLatest['id']; ?>"><?php echo $rowLatest['title'] ?></a></h3>
					<a href="post.php?id=<?php echo $rowLatest['id']; ?>"><img src="admin/upload/<?php echo $rowLatest['image']; ?>" alt="post image" /></a>
					<?php $fm->textShorten($rowLatest['body'], 100); ?>
				</div>
		<?php 
		}
		} ?>

	</div>

</div>
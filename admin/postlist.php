<?php include "inc/header.php"?>
<?php include "inc/sidebar.php"?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="10%">Post Title</th>
							<th width="20%">Description</th>
							<th width="10%">Category</th>
							<th width="10%">Image</th>
							<th width="10%">Author</th>
							<th width="10%">Tag</th>
							<th width="10%">Date</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$query = "SELECT tbl_post.* , tbl_category.name FROM tbl_post INNER JOIN tbl_category ON tbl_post.cat = tbl_category.id ORDER BY tbl_post.title DESC";
					$post = $db->select($query);
					if($post){
						$i = 0;
						while($row = $post->fetch_assoc()){
							$i++
					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $fm->textShorten($row['title'],30);?></td>
							<td><?php echo $fm->textShorten($row['body'],40);?></td>
							<td><?php echo $row['name'];?></td>
							<td><img src="upload/<?php echo $row['image'];?>" alt="post image" height = "40px" width = "60px"> </td>
							<td><?php echo $row['author'];?></td>
							<td><?php echo $row['tags'];?></td>
							<td><?php echo $fm->formatDate($row['date']) ;?></td>
							<td>
							<a href="viewpost.php?viewpostid=<?php echo $row['id'];?>">View</a> 
							<?php
								if(session::get("userid") == $row['userid'] || session::get("userRole") == '0'){
							?> 
							|| <a href="editpost.php?editpostid=<?php echo $row['id'];?>">Edit</a> || 
							<a onclick = "confirm('are you sure want to delete this post');" href="deletepost.php?delpostid=<?php echo $row['id'];?>">Delete</a>
							<?php
								}
							?>
							</td>
						</tr>
						<?php
							}
						}
						?>
					</tbody>
				</table>

               </div>
            </div>
        </div>

	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
    <?php include "inc/footer.php"?>
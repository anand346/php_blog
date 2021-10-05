<?php include "inc/header.php" ?>
<?php include "inc/sidebar.php" ?>

<div class="grid_10">

	<div class="box round first grid">
		<h2>User List</h2>
		<div class="block">
			<?php
			if (isset($_GET['deluser'])) {
                if(session::get("userRole") == '0'){
				if (is_string($_GET['deluser'])) {
					$id = htmlentities($_GET['deluser']);
					if (intval($id)) {
						$id = intval($id);
						$queryDelete = "DELETE FROM tbl_user WHERE id = $id";
						$resultDelete = $db->delete($queryDelete);
						if ($resultDelete) {
							echo "<span class = 'success'>user deleted successfully</span>";
						} else {
							echo "<span class = 'success'>user not deleted successfully</span>";
						}
					} else {
						echo "<script>window.location = 'userlist.php';</script>";
					}
				} else {
					echo "<script>window.location = 'userlist.php';</script>";
				}
			}else{
                echo "<script>window.location = 'index.php';</script>";
            }
        }
			?>
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Details</th>
						<th>Role</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$querySelectUser = "SELECT * FROM tbl_user ORDER BY id DESC";
					$getAllUsers = $db->select($querySelectUser);
					if ($getAllUsers->num_rows > 0) {
						$i = 0;
						while ($rowUser = $getAllUsers->fetch_assoc()) {
							$i++;
					?>
							<tr class="odd gradeX">
								<td><?php echo $i; ?></td>
								<td><?php echo $rowUser['username']; ?></td>
								<td><?php echo $rowUser['email']; ?></td>
								<td><?php echo $fm->textShorten($rowUser['details'],30); ?></td>
								<td>
                                <?php
                                 if($rowUser['role'] == '0'){
                                     echo "Admin";
                                 }else if($rowUser['role'] == '1'){
                                     echo "Author";
                                 }else{
                                     echo "Editor";
                                 }
                                 ?>
                                </td>
								<td><a href="viewuser.php?userid=<?php echo $rowUser['id']; ?>">View</a> 
                                <?php
                                if(session::get("userRole") == '0'){
                                ?>
                                || <a onclick="return confirm('are you sure want to delete this category');" href="?deluser=<?php echo $rowUser['id']; ?>">Delete</a>
                                <?php } ?>
                                </td>
							</tr>
					<?php }
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		setupLeftMenu();

		$('.datatable').dataTable();
		setSidebarHeight();


	});
</script>
<?php include "inc/footer.php" ?>
<?php include "inc/header.php" ?>
<?php include "inc/sidebar.php" ?>

<div class="grid_10">

	<div class="box round first grid">
		<h2>Category List</h2>
		<div class="block">
			<?php
			if (isset($_GET['delcat'])) {
				if (is_string($_GET['delcat'])) {
					$id = htmlentities($_GET['delcat']);
					if (intval($id)) {
						$id = intval($id);
						$queryDelete = "DELETE FROM tbl_category WHERE id = $id";
						$resultDelete = $db->delete($queryDelete);
						if ($resultDelete) {
							echo "<span class = 'success'>category deleted successfully</span>";
						} else {
							echo "<span class = 'success'>category not deleted successfully</span>";
						}
					} else {
						echo "<script>window.location = 'catlist.php';</script>";
					}
				} else {
					echo "<script>window.location = 'catlist.php';</script>";
				}
			}
			?>
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Category Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$query = "SELECT * FROM tbl_category ORDER BY id DESC";
					$category = $db->select($query);
					if ($category->num_rows > 0) {
						$i = 0;
						while ($row = $category->fetch_assoc()) {
							$i++;
					?>
							<tr class="odd gradeX">
								<td><?php echo $i; ?></td>
								<td><?php echo $row['name']; ?></td>
								<td><a href="editcat.php?catid=<?php echo $row['id']; ?>">Edit</a> || <a onclick="return confirm('are you sure want to delete this category');" href="?delcat=<?php echo $row['id']; ?>">Delete</a></td>
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
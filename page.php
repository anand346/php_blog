<?php include "inc/header.php"?>
	<div class="contentsection contemplete clear">
    <?php
    if (!isset($_GET['pageid'])  || $_GET['pageid'] == NULL) {
        echo "<script>window.location = '404.php';</script>";
    } else {
        if (is_string($_GET['pageid'])) {
            $id = htmlentities($_GET['pageid']);
            if (intval($id)) {
                $id = intval($id);
            } else {
                echo "<script>window.location = '404.php';</script>";
            }
        } else {
            echo "<script>window.location = '404.php';</script>";
        }
    }
    ?>
		<div class="maincontent clear">
        <?php
            $query_page = "SELECT * FROM tbl_page WHERE id = $id";
            $select_page = $db->select($query_page);
            if ($select_page->num_rows > 0) {
                $row_page = $select_page->fetch_assoc();
            }else{
                echo "<script>window.location = '404.php';</script>";
            }
            ?>
			<div class="about">
				<h2><?php echo $row_page['name'];?></h2>

				<?php echo $row_page['body'];?>
	</div>

</div>
<?php include "inc/sidebar.php"?>
<?php include "inc/footer.php"?>

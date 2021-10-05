<?php include "inc/header.php" ?>
<?php include "inc/sidebar.php" ?>
<?php
if(!isset($_GET['catid'])  || $_GET['catid'] == NULL ){
    echo "<script>window.location = 'catlist.php';</script>";
}else{
    if(is_string($_GET['catid'])){
        $id = htmlentities($_GET['catid']);
        if(intval($id)){
            $id = intval($id);
        }else{
            echo "<script>window.location = 'catlist.php';</script>";
        }
    }else{
        echo "<script>window.location = 'catlist.php';</script>";
    }
}
?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>update category</h2>
        <div class="block copyblock">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['cat_name'])) {
                    if (empty($_POST['cat_name'])) {
                        echo "<span style = 'color:red;font-size:1rem;'>category name cannot be empty</span>";
                    } else {
                        $cat_name = $fm->inputTextValidation($_POST['cat_name']);
                        $cat_name = $db->link->real_escape_string($_POST['cat_name']);
                        $query = "UPDATE tbl_category SET name = '{$cat_name}' WHERE id = $id";
                        $result = $db->update($query);
                        if ($result) {
                            echo "<span style = 'color:green;font-size:1rem;'>category updated successfully !!</span>";
                        }else{
                            echo "<span style = 'color:red;font-size:1rem;'>category could not be updated !!</span>";
                        }
                    }
                }else{
                    echo "<span style = 'color:red;font-size:1rem;'>category name is not set</span>";
                }
            }
            ?>
            <?php
            $query1 = "SELECT * FROM tbl_category WHERE id = $id";
            $category1 = $db->select($query1);
            $result1 = $category1->fetch_assoc();
            ?>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" name="cat_name" placeholder="Enter Category Name..." class="medium"  value = "<?php echo $result1['name'];?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include "inc/footer.php" ?>
<?php include "inc/header.php" ?>
<?php include "inc/sidebar.php" ?>
<?php
if(!isset($_GET['viewpostid'])  || $_GET['viewpostid'] == NULL ){
    echo "<script>window.location = 'postlist.php';</script>";
    // die("there's an error");
}else{
    if(is_string($_GET['viewpostid'])){
        $postid = htmlentities($_GET['viewpostid']);
        if(intval($postid)){
            $postid = intval($postid);
        }else{
            echo "<script>window.location = 'postlist.php';</script>";
        }
    }else{
        echo "<script>window.location = 'postlist.php';</script>";
    }
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>view Post</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            echo "<script>window.location = 'postlist.php';</script>";
        }
        ?>
        <div class="block">
            <?php
            $query = "SELECT * FROM tbl_post WHERE id = $postid ORDER BY id DESC";
            $getpost = $db->select($query);
            $resultpost = $getpost->fetch_assoc();
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" readonly value = "<?php echo $resultpost['title'];?>" placeholder="Enter Post Title..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" readonly>
                                <option selected>Select Category</option>
                                <?php
                                $displayCategory = "SELECT * FROM tbl_category";
                                $resultCategory = $db->select($displayCategory);
                                if ($resultCategory->num_rows > 0) {
                                    while ($rowCategory = $resultCategory->fetch_assoc()) {
                                        if($resultpost['cat'] == $rowCategory['id']){
                                            $select = "selected";
                                        }else{
                                            $select = "";
                                        }
                                        echo "<option value='{$rowCategory['id']}' $select>{$rowCategory['name']}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label> Image</label>
                        </td>
                        <td>
                            <input type="file" readonly /><br>
                            <img src="upload/<?php echo $resultpost['image'];?>" width = "200px" height = "80px" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea class="tinymce" readonly ><?php echo $resultpost['body'];?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>tags</label>
                        </td>
                        <td>
                            <input type="text" value = "<?php echo $resultpost['tags'];?>" readonly placeholder="Enter tags..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" Value="OK" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>

<?php include "inc/footer.php" ?>
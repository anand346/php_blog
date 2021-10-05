<?php include "inc/header.php" ?>
<?php include "inc/sidebar.php" ?>
<?php
if(!isset($_GET['editpostid'])  || $_GET['editpostid'] == NULL ){
    echo "<script>window.location = 'postlist.php';</script>";
    // die("there's an error");
}else{
    if(is_string($_GET['editpostid'])){
        $postid = htmlentities($_GET['editpostid']);
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
        <h2>update Post</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $title = $db->link->real_escape_string(htmlentities($_POST['title']));
            $cat = $db->link->real_escape_string(htmlentities($_POST['cat']));
            $body = $db->link->real_escape_string(htmlentities($_POST['body']));
            $tags = $db->link->real_escape_string(htmlentities($_POST['tags']));
            $author = htmlentities(session::get("username"));
            $userid = session::get("userid");
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
            $uploaded_image = "upload/" . $unique_image;
            if ($title == "" || $cat == "" || $body == "" || $author == "" || $tags == "") {
                echo "<span class = 'error'>fields must not be empty</span>";
            } else{
                if(!empty($file_name)){
                    if ($file_size > 1048567) {
                        echo "<span class='error'>Image Size should be less then 1MB!</span>";
                    } elseif (in_array($file_ext, $permited) === false) {
                        echo "<span class='error'>You can upload only:-". implode(', ', $permited) . "</span>";
                    } else {
                        move_uploaded_file($file_temp, $uploaded_image);
                        $query = "UPDATE tbl_post SET  cat = '{$cat}',title = '{$title}', body = '{$body}', image = '{$unique_image}', author = '{$author}', tags = '{$tags}' WHERE id = $postid";
                        $updated_rows = $db->update($query);
                        if ($updated_rows) {
                            echo "<span class='success'>Post updated Successfully.</span>";
                        } else {
                            echo "<span class='error'>Post Not updated !</span>";
                        }
                    }
                } else{
                        $query = "UPDATE tbl_post SET  cat = '{$cat}',title = '{$title}', body = '{$body}', author = '{$author}', tags = '{$tags}' WHERE id = $postid";
                        $updated_rows = $db->update($query);
                        if ($updated_rows) {
                            echo "<span class='success'>Post updated Successfully.</span>";
                        } else {
                            echo "<span class='error'>Post Not updated !</span>";
                        }
                }
            }
            
        }
        ?>
        <div class="block">
            <?php
            $query = "SELECT * FROM tbl_post WHERE id = $postid ORDER BY id DESC";
            $getpost = $db->select($query);
            $resultpost = $getpost->fetch_assoc();
            ?>
            <form action="editpost.php?editpostid=<?php echo $postid;?>" method="POST" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" name="title" value = "<?php echo $resultpost['title'];?>" placeholder="Enter Post Title..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="cat">
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
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input type="file" name="image" /><br>
                            <img src="upload/<?php echo $resultpost['image'];?>" width = "200px" height = "80px" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="body" ><?php echo $resultpost['body'];?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>tags</label>
                        </td>
                        <td>
                            <input type="text" value = "<?php echo $resultpost['tags'];?>" name="tags" placeholder="Enter tags..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
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
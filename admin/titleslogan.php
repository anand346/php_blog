<?php include "inc/header.php" ?>
<?php include "inc/sidebar.php" ?>
<div class="grid_10">
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = $db->link->real_escape_string(htmlentities($_POST['title']));
    $slogan = $db->link->real_escape_string(htmlentities($_POST['slogan']));
    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];
    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $uploaded_image = "upload/" . $unique_image;
    if ($title == "" || $slogan == "") {
        echo "<span class = 'error'>fields must not be empty</span>";
    } else{
        if(!empty($file_name)){
            if ($file_size > 1048567) {
                echo "<span class='error'>Image Size should be less then 1MB!</span>";
            } elseif (in_array($file_ext, $permited) === false) {
                echo "<span class='error'>You can upload only:-". implode(', ', $permited) . "</span>";
            } else {
                $select_title_data = "SELECT * FROM  title_slogan WHERE id = 1";
                $result_title_data = $db->select($select_title_data);
                if($result_title_data){
                    $row_title_data = $result_title_data->fetch_assoc();
                    unlink("upload/".$row_title_data['logo']);
                }
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "UPDATE title_slogan SET  title = '{$title}',slogan = '{$slogan}', logo = '{$unique_image}' WHERE id = 1";
                $updated_rows = $db->update($query);
                if ($updated_rows) {
                    echo "<span class='success'>title updated Successfully.</span>";
                } else {
                    echo "<span class='error'>title Not updated !</span>";
                }
            }
        } else{
                $query = "UPDATE title_slogan SET  title = '{$title}',slogan = '{$slogan}' WHERE id = 1";
                $updated_rows = $db->update($query);
                if ($updated_rows) {
                    echo "<span class='success'>title updated Successfully.</span>";
                } else {
                    echo "<span class='error'>title Not updated !</span>";
                }
        }
    }
    
}
?>
    <div class="box round first grid">
        <h2>Update Site Title and Description</h2>
        <div class="block sloginblock">
        <?php
        $query = "SELECT * FROM title_slogan WHERE id = 1";
        $site_details = $db->select($query);
        if($site_details->num_rows > 0){
            $row = $site_details->fetch_assoc();
        }
        ?>
            <form action = "titleslogan.php" method = "POST" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Website Title</label>
                        </td>
                        <td>
                            <input type="text" value = "<?php echo $row['title']; ?>" name="title" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Upload logo</label>
                        </td>
                        <td>
                            <input type="file" name="image" /><br>
                            <img src="upload/<?php echo $row['logo'];?>" width = "170px" height = "160px" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Website Slogan</label>
                        </td>
                        <td>
                            <input type="text" value = "<?php echo $row['slogan']; ?>" name="slogan" class="medium" />
                        </td>
                    </tr>


                    <tr>
                        <td>
                        </td>
                        <td>
                            <input type="submit" name="submit" Value="Update" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include "inc/footer.php" ?>
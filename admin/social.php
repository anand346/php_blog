<?php include "inc/header.php" ?>
<?php include "inc/sidebar.php" ?>
<div class="grid_10">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $facebook = $db->link->real_escape_string(htmlentities($_POST['facebook']));
        $twitter = $db->link->real_escape_string(htmlentities($_POST['twitter']));
        $linkedin = $db->link->real_escape_string(htmlentities($_POST['linkedin']));
        $instagram = $db->link->real_escape_string(htmlentities($_POST['instagram']));
    if($facebook == "" || $linkedin == "" || $twitter == "" || $instagram == ""){
        echo "<span class='success'>fields must not be empty </span>";
    }
    $update_social_query = "UPDATE tbl_social SET facebook = '{$facebook}',linkedin = '{$linkedin}',twitter = '{$twitter}',instagram = '{$instagram}' WHERE id = 1";
    $result_update = $db->update($update_social_query);
    if ($result_update) {
        echo "<span class='success'> link updated Successfully.</span>";
    } else {
        echo "<span class='error'>link not updated successfully !</span>";
    }
}
    ?>
    <div class="box round first grid">
        <h2>Update Social Media</h2>
        <div class="block">
            <?php
            $social_query = "SELECT * FROM tbl_social WHERE id = 1";
            $social_select_data = $db->select($social_query);
            if ($social_select_data) {
                $row_social_data = $social_select_data->fetch_assoc();
            }
            ?>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <table class="form">
                    <tr>
                        <td>
                            <label>Facebook</label>
                        </td>
                        <td>
                            <input type="text" name="facebook" value="<?php echo $row_social_data['facebook']; ?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Twitter</label>
                        </td>
                        <td>
                            <input type="text" name="twitter" value="<?php echo $row_social_data['twitter']; ?>" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>LinkedIn</label>
                        </td>
                        <td>
                            <input type="text" name="linkedin" value="<?php echo $row_social_data['linkedin']; ?>" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Instagram</label>
                        </td>
                        <td>
                            <input type="text" name="instagram" value="<?php echo $row_social_data['instagram']; ?>" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td></td>
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
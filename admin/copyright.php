<?php include "inc/header.php" ?>
<?php include "inc/sidebar.php" ?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Update Copyright Text</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $copyright = $db->link->real_escape_string(htmlentities($_POST['copyright']));
            if ($copyright == "" ) {
                echo "<span class='success'>fields must not be empty </span>";
            }
            $update_copyright_query = "UPDATE tbl_footer SET copyright = '{$copyright}' WHERE id = 1";
            $result_update = $db->update($update_copyright_query);
            if ($result_update) {
                echo "<span class='success'> copyright updated Successfully.</span>";
            } else {
                echo "<span class='error'>copyright not updated successfully !</span>";
            }
        }
        ?>
        <div class="block copyblock">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <table class="form">
                    <?php
                    $copyright_query = "SELECT * FROM tbl_footer WHERE id = 1";
                    $select_copyright = $db->select($copyright_query);
                    if ($select_copyright->num_rows > 0) {
                        $row_copyright = $select_copyright->fetch_assoc();
                    }
                    ?>
                    <tr>
                        <td>
                            <input type="text" value="<?php echo $row_copyright['copyright']; ?>" name="copyright" class="large" />
                        </td>
                    </tr>

                    <tr>
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
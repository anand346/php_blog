<?php include "inc/header.php" ?>
<?php include "inc/sidebar.php" ?>
<div class="grid_10">
    <?php
    if (!isset($_GET['userid'])  || $_GET['userid'] == NULL) {
        echo "<script>window.location = 'userlist.php';</script>";
    } else {
        if (is_string($_GET['userid'])) {
            $id = htmlentities($_GET['userid']);
            if (intval($id)) {
                $id = intval($id);
            } else {
                echo "<script>window.location = 'userlist.php';</script>";
            }
        } else {
            echo "<script>window.location = 'userlist.php';</script>";
        }
    }
    ?>
    <div class="box round first grid">
        <h2>update User</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            echo "<script>window.location = 'userlist.php';</script>";
        }
        ?>
        <div class="block">
            <?php
            $queryuser = "SELECT * FROM tbl_user WHERE id = $id ";
            $getuser = $db->select($queryuser);
            $resultuser = $getuser->fetch_assoc();
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Username</label>
                        </td>
                        <td>
                            <input type="text" name="username" value="<?php echo $resultuser['username']; ?>" placeholder="Enter username..." class="medium" readonly />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="text" name="email" value="<?php echo $resultuser['email']; ?>" placeholder="Enter email..." class="medium" readonly />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Role</label>
                        </td>
                        <td>
                            <input type="text" name="role" value = "<?php
                            if ($resultuser['role'] == '0') {
                                echo "Admin";
                            } else if ($resultuser['role'] == '1') {
                                echo "Author";
                            } else {
                                echo "Editor";
                            }
                            ?>" placeholder="Enter role..." class="medium" readonly />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Details</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="details" readonly><?php echo $resultuser['details']; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="OK" />
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
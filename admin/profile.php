<?php include "inc/header.php" ?>
<?php include "inc/sidebar.php" ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>update User</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $username = $db->link->real_escape_string(htmlentities($_POST['username']));
            $email = $db->link->real_escape_string(htmlentities($_POST['email']));
            $details = $db->link->real_escape_string($_POST['details']);
            if ($username == "" || $email == "" || $details == "") {
                echo "<span class = 'error'>fields must not be empty</span>";
            }  else{
                    $checkEmailQuery = "SELECT * FROM tbl_user WHERE email = '{$email}'";
                    $getEmailQuery = $db->select($checkEmailQuery);
                    if($getEmailQuery){
                        echo "<span class = 'error'>email is taken already</span>";
                    }else{
                        $query = "UPDATE tbl_user SET  details = '{$details}',email = '{$email}' WHERE id = '{$_SESSION['userid']}'";
                        $updated_rows = $db->update($query);
                        if ($updated_rows) {
                            echo "<span class='success'>User updated Successfully.</span>";
                        } else {
                            echo "<span class='error'>User Not updated !</span>";
                        }
                    }
                }
            }
        ?>
        <div class="block">
            <?php
            $userid = $_SESSION['userid'];
            $userRole = $_SESSION['userRole'];
            $queryuser = "SELECT * FROM tbl_user WHERE id = $userid AND role = $userRole";
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
                            <input type="text" name="username" value = "<?php echo $resultuser['username'];?>" placeholder="Enter username..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="text" name="email" value = "<?php echo $resultuser['email'];?>" placeholder="Enter email..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Details</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="details" ><?php echo $resultuser['details'];?></textarea>
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
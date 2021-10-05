<?php include "inc/header.php" ?>
<?php include "inc/sidebar.php" ?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Change Password</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $username = session::get('username');
            $old_password = $db->link->real_escape_string(htmlentities($_POST['oldPassword']));
            $old_password = md5($old_password);
            $new_password = $db->link->real_escape_string(htmlentities($_POST['newPassword']));
            $new_password = md5($new_password);
            $password_check_query = "SELECT * FROM tbl_user WHERE username = '{$username}' AND password = '{$old_password}' LIMIT 1";
            $password_check = $db->select($password_check_query);
            if ($password_check) {
                $password_update_query = "UPDATE tbl_user SET password = '{$new_password}' WHERE username = '{$username}'";
                $password_update = $db->update($password_update_query);
                if ($password_update) {
                    echo "<span style = 'color:green;font-size:18px;'>Password updated successfully.</span>";
                }
            }else{
                echo "<span style = 'color:red;font-size:18px;'>password is incorrect.</span>";
            }  
        }
        ?>
        <div class="block">
            <form action="" method="POST">
                <table class="form">
                    <tr>
                        <td>
                            <label>Old Password</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Enter Old Password..." name="oldPassword" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>New Password</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Enter New Password..." name="newPassword" class="medium" />
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
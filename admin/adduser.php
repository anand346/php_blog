<?php include "inc/header.php" ?>
<?php include "inc/sidebar.php" ?>
<div class="grid_10">
<?php
if(session::get("userRole") != '0'){
    echo "<script>window.location = 'index.php';</script>";
}
?>
    <div class="box round first grid">
        <h2>Add New User</h2>
        <div class="block copyblock">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $token = $db->link->real_escape_string(htmlentities($_POST['token']));
                if (!empty($token)) {
                    if (hash_equals($_SESSION['token_generate'],$token)) {
                        $username = $fm->inputTextValidation($_POST['username']);
                        $password = $fm->inputTextValidation($_POST['password']);
                        $role = $fm->inputTextValidation($_POST['role']);
                        $password = md5($db->link->real_escape_string($password));
                        $username = $db->link->real_escape_string($username);
                        $role = $db->link->real_escape_string($role);
                        $check_username_availability_query = "SELECT * FROM tbl_user WHERE username = '{$username}'";
                        $check_username_availability_query_result = $db->select($check_username_availability_query);
                        if($role == "0" || $role == "1" || $role == "2"){
                            if (empty($username) || empty($password)) {
                                echo "<span style = 'color:green;font-size:1rem;'> fields must not be empty</span>";
                            }elseif($check_username_availability_query_result->num_rows > 0){
                                echo "<span style = 'color:red;font-size:1rem;'>username is already taken,please choose another one.</span>";
                            } else {
                                $query_insert = "INSERT INTO tbl_user(username,password,role) VALUES('{$username}','{$password}','{$role}')";
                                $result = $db->insert($query_insert);
                                if ($result) {
                                    echo "<span style = 'color:green;font-size:1rem;'> user created successfully !!</span>";
                                } else {
                                    echo "<span style = 'color:red;font-size:1rem;'> user not created !!</span>";
                                }
                            }
                        }else{
                            echo "<span style = 'color:red;font-size:1rem;'> role is not defined !!</span>";
                        }
                    } else {
                        echo "<span style = 'color:red;font-size:1rem;'> look like someone wants to access this account from another source!!</span>";

                    }
                }else{
                    echo "<span style = 'color:red;font-size:1rem;'> please login again!!</span>";
                }
                
            }
            ?>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <table class="form">
                <input type="hidden" name="token" value = "<?php echo session::get('token_generate'); ?>" />

                    <tr>
                        <td>
                            <label>Username</label>
                        </td>
                        <td>
                            <input type="text" name="username" placeholder="Enter Username..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Password</label>
                        </td>
                        <td>
                            <input type="text" name="password" placeholder="Enter Password..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>User Role</label>
                        </td>
                        <td>
                            <select name="role" id="select">
                                <option selected>select user role</option>
                                <option value="0">Admin</option>
                                <option value="1">Author</option>
                                <option value="2">Editor</option>
                            </select>
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
<?php include "inc/footer.php" ?>
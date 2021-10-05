<?php include "inc/header.php" ?>
<?php include "inc/sidebar.php" ?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Add New Category</h2>
        <div class="block copyblock">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['cat_name'])) {
                    if (empty($_POST['cat_name'])) {
                        echo "<span style = 'color:red;font-size:1rem;'>category name cannot be empty</span>";
                    } else {
                        $cat_name = $fm->inputTextValidation($_POST['cat_name']);
                        $cat_name = $db->link->real_escape_string($_POST['cat_name']);
                        $query = "INSERT INTO tbl_category(name) VALUES('{$cat_name}')";
                        $result = $db->insert($query);
                        if ($result) {
                            echo "<span style = 'color:green;font-size:1rem;'>category inserted successfully !!</span>";
                        }else{
                            echo "<span style = 'color:red;font-size:1rem;'>category could not be inserted !!</span>";
                        }
                    }
                }else{
                    echo "<span style = 'color:red;font-size:1rem;'>category name is not set</span>";
                }
            }
            ?>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" name="cat_name" placeholder="Enter Category Name..." class="medium" />
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
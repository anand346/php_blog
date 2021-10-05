<?php include "inc/header.php" ?>
<?php include "inc/sidebar.php" ?>
<div class="grid_10">
    <style>
        .actiondel {
            margin-left: 10px;
        }

        .actiondel a {
            border: 1px solid #ddd;
            color: #444;
            cursor: pointer;
            font-size: 20px;
            padding: 2px 10px;
            background-color:#f0f0f0;
            font-weight:normal;
            }
    </style>
    <?php
    if (!isset($_GET['pageid'])  || $_GET['pageid'] == NULL) {
        echo "<script>window.location = 'addpage.php';</script>";
    } else {
        if (is_string($_GET['pageid'])) {
            $id = htmlentities($_GET['pageid']);
            if (intval($id)) {
                $id = intval($id);
            } else {
                echo "<script>window.location = 'addpage.php';</script>";
            }
        } else {
            echo "<script>window.location = 'addpage.php';</script>";
        }
    }
    ?>
    <div class="box round first grid">
        <h2>edit page</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $db->link->real_escape_string(htmlentities($_POST['name']));
            $body = $db->link->real_escape_string(htmlentities($_POST['body']));
            if ($name == "" || $body == "") {
                echo "<span class = 'error'>fields must not be empty</span>";
            } else {
                $query = "UPDATE tbl_page SET name = '{$name}',body = '{$body}' WHERE id = $id";
                $updated_rows = $db->update($query);
                if ($updated_rows) {
                    echo "<span class='success'>page updated Successfully.</span>";
                } else {
                    echo "<span class='error'>page not updated Successfully.</span>";
                }
            }
        }
        ?>
        <div class="block">
            <?php
            $query_page = "SELECT * FROM tbl_page WHERE id = $id";
            $select_page = $db->select($query_page);
            if ($select_page->num_rows > 0) {
                $row_page = $select_page->fetch_assoc();
            } else {
                echo "no such page exists";
            }
            ?>
            <form action="page.php?pageid=<?php echo $id; ?>" method="POST">
                <table class="form">
                    <tr>
                        <td>
                            <label>name</label>
                        </td>
                        <td>
                            <input type="text" name="name" value="<?php echo $row_page['name']; ?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>body</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="body"><?php echo $row_page['body']; ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Update" />
                            <span class="actiondel"><a onclick="return confirm('are you really want to delete this page');" href="delpage.php?delpage=<?php echo $row_page['id'];?>">Delete</a> </span>
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
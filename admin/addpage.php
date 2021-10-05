<?php include "inc/header.php" ?>
<?php include "inc/sidebar.php" ?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Add New page</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $db->link->real_escape_string($_POST['name']);
            $body = $db->link->real_escape_string($_POST['body']);
            if ($name == "" || $body == "" ) {
                echo "<span class = 'error'>fields must not be empty</span>";
            } else {
                $query = "INSERT INTO tbl_page(name,body) VALUES('{$name}','{$body}')";
                $inserted_rows = $db->insert($query);
                if ($inserted_rows) {
                    echo "<span class='success'>page added Successfully.</span>";
                } else {
                    echo "<span class='error'>page Not added successfully !</span>";
                }
            }
        }
        ?>
        <div class="block">
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" >
                <table class="form">
                    <tr>
                        <td>
                            <label>name</label>
                        </td>
                        <td>
                            <input type="text" name="name" placeholder="Enter Post Title..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>body</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="body"></textarea>
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
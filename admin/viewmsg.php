<?php include "inc/header.php" ?>
<?php include "inc/sidebar.php" ?>
<div class="grid_10">
    <?php
    if (!isset($_GET['msgid'])  || $_GET['msgid'] == NULL) {
        echo "<script>window.location = 'inbox.php';</script>";
    } else {
        if (is_string($_GET['msgid'])) {
            $id = htmlentities($_GET['msgid']);
            if (intval($id)) {
                $id = intval($id);
            } else {
                echo "<script>window.location = 'inbox.php';</script>";
            }
        } else {
            echo "<script>window.location = 'inbox.php';</script>";
        }
    }
    ?>
    <div class="box round first grid">
        <h2>view message</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            echo "<script>window.location = 'inbox.php';</script>";
        }
        ?>
        <div class="block">
            <form action = "" method="POST">
            <?php
                 $query_contact = "SELECT * FROM tbl_contact WHERE id = $id";
                 $contact_detail = $db->select($query_contact);
                 if($contact_detail){
                    $result_contact = $contact_detail->fetch_assoc();
                 }else{
                     echo "<span>no record found</span>";die();
                 }
            ?>
                <table class="form">
                    <tr>
                        <td>
                            <label>name</label>
                        </td>
                        <td>
                            <input type="text" readonly value = "<?php echo $result_contact['first_name'].' '.$result_contact['last_name'];?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>email</label>
                        </td>
                        <td>
                            <input type="text" readonly value = "<?php echo $result_contact['email'];?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>date</label>
                        </td>
                        <td>
                            <input type="text" readonly  value = "<?php echo $fm->formatDate($result_contact['date']);?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label>message</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="body"><?php echo $result_contact['body'];?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="ok" />
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
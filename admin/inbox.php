<?php include "inc/header.php" ?>
<?php include "inc/sidebar.php" ?>
<?php
if (isset($_GET['seenid']) && $_GET['seenid'] != null) {
    if (is_string($_GET['seenid'])) {
        $seenid = htmlentities($_GET['seenid']);
        if (intval($seenid)) {
            $seenid = intval($seenid);
            $query_update = "UPDATE tbl_contact SET status = 1 WHERE id = $seenid";
            $query_update_result = $db->update($query_update);
            if ($query_update_result) {
                echo "<span class = 'success'>message sent in the seen box</span>";
            } else {
                echo "<span class = 'error'>something went wrong</span>";
            }
        } else {
            echo "<script>window.location = 'inbox.php';</script>";
        }
    } else {
        echo "<script>window.location = 'inbox.php';</script>";
    }
}

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Inbox</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query_contact = "SELECT * FROM tbl_contact WHERE status = 0 ORDER BY id DESC";
                    $contact_list = $db->select($query_contact);
                    if ($contact_list) {
                        $i = 0;
                        while ($contact_assoc = $contact_list->fetch_assoc()) {
                            $i++;
                    ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $contact_assoc['first_name'] . " " . $contact_assoc['last_name']; ?></td>
                                <td><?php echo $contact_assoc['email']; ?></td>
                                <td><?php echo $fm->textShorten($contact_assoc['body'], 30); ?></td>
                                <td><?php echo $fm->formatDate($contact_assoc['date']); ?></td>
                                <td>
                                    <a href="viewmsg.php?msgid=<?php echo $contact_assoc['id']; ?>">View</a> ||
                                    <a href="replymsg.php?msgid=<?php echo $contact_assoc['id']; ?>">Reply</a> ||
                                    <a onclick="return confirm('are you sure send this to seen box');" href="?seenid=<?php echo $contact_assoc['id']; ?>">Seen</a> ||
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="box round first grid">
        <h2>Seen Message</h2>
        <?php
        if (isset($_GET['delid']) && $_GET['delid'] != null) {
            if (is_string($_GET['delid'])) {
                $delid = htmlentities($_GET['delid']);
                if (intval($delid)) {
                    $delid= intval($delid);
                    $query_delete = "DELETE FROM tbl_contact WHERE id = $delid";
                    $query_delete_result = $db->delete($query_delete);
                    if ($query_delete_result) {
                        echo "<span class = 'success'>message deleted from seen box</span>";
                    } else {
                        echo "<span class = 'error'>something went wrong</span>";
                    }
                } else {
                    echo "<script>window.location = 'inbox.php';</script>";
                }
            } else {
                echo "<script>window.location = 'inbox.php';</script>";
            }
        }

        ?>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query_contact_seen = "SELECT * FROM tbl_contact WHERE status = 1 ORDER BY id DESC";
                    $contact_list_seen = $db->select($query_contact_seen);
                    if ($contact_list_seen) {
                        $i = 0;
                        while ($contact_assoc_seen = $contact_list_seen->fetch_assoc()) {
                            $i++;
                    ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $contact_assoc_seen['first_name'] . " " . $contact_assoc_seen['last_name']; ?></td>
                                <td><?php echo $contact_assoc_seen['email']; ?></td>
                                <td><?php echo $fm->textShorten($contact_assoc_seen['body'], 30); ?></td>
                                <td><?php echo $fm->formatDate($contact_assoc_seen['date']); ?></td>
                                <td>
                                    <a href="viewmsg.php?msgid=<?php echo $contact_assoc_seen['id'] ;?>">View</a> ||
                                    <a onclick="return confirm('are you sure want to delete this message');" href="?delid=<?php echo $contact_assoc_seen['id']; ?>">Delete</a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();


    });
</script>
<?php include "inc/footer.php" ?>
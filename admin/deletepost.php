<?php include "../lib/session.php" ?>
<?php
session::checkSession();
?>
<?php include "../config/config.php"; ?>
<?php include "../lib/Database.php"; ?>
<?php include "../helpers/format.php"; ?>
<?php
$db = new Database();
$fm = new format();
?>
<?php
if (!isset($_GET['delpostid'])  || $_GET['delpostid'] == NULL) {
    // echo "<script>window.location = 'postlist.php';</script>";
    die("there's an error");
} else {
    if (is_string($_GET['delpostid'])) {
        $postid = htmlentities($_GET['delpostid']);
        if (intval($postid)) {
            $postid = intval($postid);
        } else {
            echo "<script>window.location = 'postlist.php';</script>";
        }
    } else {
        echo "<script>window.location = 'postlist.php';</script>";
    }
}
$query = "SELECT * FROM tbl_post WHERE id = $postid";
$getpost = $db->select($query);
if ($getpost->num_rows > 0) {
    $row = $getpost->fetch_assoc();
    $postimg = $row['image'];
    if (unlink("upload/" . $postimg)) {
        $delquery = "DELETE FROM tbl_post WHERE id = $postid";
        $delresult = $db->delete($delquery);
        if ($delresult) {
            // die("there's an error");
            echo "<script>window.location = 'postlist.php';</script>";
        }
    }
}
?>
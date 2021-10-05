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
if (!isset($_GET['delpage'])  || $_GET['delpage'] == NULL) {
    // echo "<script>window.location = 'postlist.php';</script>";
    die("there's an error");
} else {
    if (is_string($_GET['delpage'])) {
        $pageid = htmlentities($_GET['delpage']);
        if (intval($pageid)) {
            $pageid = intval($pageid);
        } else {
            echo "<script>window.location = 'index.php';</script>";
        }
    } else {
        echo "<script>window.location = 'index.php';</script>";
    }
}
        $delquery = "DELETE FROM tbl_page WHERE id = $pageid";
        $delresult = $db->delete($delquery);
        if ($delresult) {
            // die("there's an error");
           echo "<script>alert('page deleted successfully');</script>";
            echo "<script>window.location = 'index.php';</script>";
        }
?>
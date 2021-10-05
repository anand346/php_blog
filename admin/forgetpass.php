<?php include "../lib/session.php" ?>
<?php
session::checkLogin();
?>
<?php include "../config/config.php" ?>
<?php include "../lib/Database.php" ?>
<?php include "../helpers/format.php"; ?>
<?php
$db = new Database();
$fm = new format();
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Password Recovery</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>

<body>
    <div class="container">
        <section id="content">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $email = $fm->inputTextValidation($_POST['email']);
                $email = $db->link->real_escape_string($email);
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $query = "SELECT * FROM tbl_user WHERE email = '{$email}'";
                    $result = $db->select($query);
                    if ($result != false) {
                        $row = $result->fetch_assoc();
                        $userid = $row['id'];
                        $username = $row['username'];
                        $text = substr($email, 0, 3);
                        $rand = rand(10000, 99999);
                        $newpass = "$text$rand";
                        $password = md5($newpass);
                        $to = $email;
                        $subject = "Password Recovery";
                        $message = "your username is " . $username . " and password is " . $password . " please visit website to login";
                        $from = "cmsproject@gmail.com";
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        $headers .= "From : $from\n";
                        $sendMail = mail($to, $subject, $message, $headers);
                        if ($sendMail) {
                            $updatePass = "UPDATE tbl_user SET password = '{$password}' WHERE id = $userid";
                            $updatedPass = $db->update($updatePass);
                            if ($updatedPass) {
                                echo "<span style = 'color:green;font-size:18px;'>Email sent successfully !!</span>";
                            } else {
                                echo "<span style = 'color:red;font-size:18px;'>something went wrong !!</span>";
                            }
                        } else {
                            echo "<span style = 'color:red;font-size:18px;'>Email not sent  !!</span>";
                        }
                    } else {
                        echo "<span style = 'color:red;font-size:18px;'>Email not found !!</span>";
                    }
                } else {
                    echo "<span style = 'color:red;font-size:18px;'>Please provide valid email address !!</span>";
                }
            }
            ?>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <h1>Forget Password</h1>
                <div>
                    <input type="text" placeholder="Email" required name="email" />
                </div>
                <div>
                    <input type="submit" value="Send Mail" />
                </div>
            </form><!-- form -->
            <div class="button">
                <a href="login.php">Login</a>
            </div>
            <!-- button -->
        </section><!-- content -->
    </div><!-- container -->
</body>

</html>
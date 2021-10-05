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
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>

<body>
	<div class="container">
		<section id="content">
			<?php
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				$username = $fm->inputTextValidation($_POST['username']);
				$password = md5($_POST['password']);
				$password = $fm->inputTextValidation($password);
				$username = $db->link->real_escape_string($_POST['username']);
				$password = $db->link->real_escape_string($password);
				$query = "SELECT * FROM tbl_user WHERE username = '{$username}' AND password = '{$password}'";
				$result = $db->select($query);
				if ($result) {
					if ($result->num_rows > 0) {
						$row = $result->fetch_assoc();
						$token_generate = bin2hex(random_bytes(32));
						session::set("token_generate", $token_generate);
						session::set("login", true);
						session::set("username", $row['username']);
						session::set("userid", $row['id']);
						session::set("userRole", $row['role']);
						header("location:index.php");
					} else {
						echo "<span style = 'color:red;font-size:18px;'>No result found !!</span>";
					}
				} else {
					echo "<span style = 'color:red;font-size:18px;'>username or password does not matched !!</span>";
				}
			}
			?>
			<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
				<h1>Admin Login</h1>
				<div>
					<input type="text" placeholder="Username" required name="username" />
				</div>
				<div>
					<input type="password" placeholder="Password" required name="password" />
				</div>
				<div>
					<input type="submit" value="Log in" />
				</div>
			</form><!-- form -->
			<div class="button">
				<a href="forgetpass.php">Forget Password</a>
			</div>
			<!-- button -->
		</section><!-- content -->
	</div><!-- container -->
</body>

</html>
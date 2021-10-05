<?php include "inc/header.php"?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		<?php
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$fname = $fm->inputTextValidation($_POST['firstname']);
			$lname = $fm->inputTextValidation($_POST['lastname']);
			$email = $fm->inputTextValidation($_POST['email']);
			$body = $fm->inputTextValidation($_POST['body']);
            $fname = $db->link->real_escape_string($fname);
            $lname = $db->link->real_escape_string($lname);
            $email = $db->link->real_escape_string($email);
            $body = $db->link->real_escape_string($body);
            if ($fname == "" || $body == "" || $email == "" || $lname == "" ) {
               $error = "fields must not be empty";
            } else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$error = "email is not valid";
            }else{
				$query_contact = "INSERT INTO tbl_contact(first_name,last_name,email,body) VALUES('{$fname}','{$lname}','{$email}','{$body}')";
				$inserted_rows = $db->insert($query_contact);
                if ($inserted_rows) {
                   $msg = "message sent successfully";
                } else {
                   $error = "message not sent successfully";
                }
			}
        }
		?>
			<div class="about">
				<h2>Contact us</h2>
				<?php
				if(isset($error)){
					echo "<span style = 'color:red;'>{$error}</span>";
				}else if(isset($msg)){
					echo "<span style = 'color:green;'>{$msg}</span>";
				}
				?>
			<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name" />
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name" />
					</td>
				</tr>

				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="email" name="email" placeholder="Enter Email Address" />
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name = "body"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
		</table>
	<form>
 </div>

</div>
<?php include "inc/sidebar.php"?>
<?php include "inc/footer.php"?>
<?php include "config/config.php"; ?>
<?php include "lib/Database.php"; ?>
<?php include "helpers/format.php"; ?>
<?php
$db = new Database();
$fm = new format();
?>
<!DOCTYPE html>
<html oncontextmenu="return false;">

<head>
	<?php
	if (isset($_GET['pageid'])) {
		if (is_string($_GET['pageid'])) {
			$titlepageid = htmlentities($_GET['pageid']);
			if (intval($titlepageid)) {
				$titlepageid = intval($titlepageid);
			} else {
				echo "<script>window.location = 'index.php';</script>";
			}
		} else {
			echo "<script>window.location = 'index.php';</script>";
		}
		$query_page = "SELECT * FROM tbl_page WHERE id = $titlepageid";
		$select_page = $db->select($query_page);
		if ($select_page->num_rows > 0) {
			$row_page = $select_page->fetch_assoc();
		} else {
			echo "<script>window.location = 'index.php';</script>";
		}
	?>
	<title><?php echo $row_page['name']; ?> - <?php echo TITLE; ?></title>
	<?php } else if (isset($_GET['id'])) {
		if (is_string($_GET['id'])) {
			$titlepostid = htmlentities($_GET['id']);
			if (intval($titlepostid)) {
				$titlepostid = intval($titlepostid);
			} else {
				echo "<script>window.location = 'index.php';</script>";
			}
		} else {
			echo "<script>window.location = 'index.php';</script>";
		}
		$query_post = "SELECT * FROM tbl_post WHERE id = $titlepostid";
		$select_post = $db->select($query_post);
		if ($select_post->num_rows > 0) {
			$row_post = $select_post->fetch_assoc();
		} else {
			echo "<script>window.location = 'index.php';</script>";
		}
	?>
	<title><?php echo $row_post['title']; ?> - <?php echo TITLE; ?></title>
	<?php } else{?>
	<title><?php echo $fm->title(); ?> - <?php echo TITLE; ?></title>
	<?php } ?>
	<meta name="language" content="English">
	<meta name="description" content="It is a website for blog">
	<?php
	if(isset($_GET['id']) AND $_GET['id'] != null){
		$metaid = $db->link->real_escape_string(htmlentities($_GET['id']));
		$querymetaid = "SELECT * FROM tbl_post WHERE id = $metaid";
		$resultmetaid = $db->select($querymetaid);
		if($resultmetaid){
			$rowmetaid = $resultmetaid->fetch_assoc();
	?>
		 <meta name="keywords" content="<?php echo $rowmetaid['tags']; ?>">
	<?php
		}
	}else{
	?>
		 <meta name="keywords" content="<?php echo KEYWORDS; ?>">
	<?php
		}	
	?>
	<meta name="author" content="anand">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

	<script type="text/javascript">
		$(window).load(function() {
			$('#slider').nivoSlider({
				effect: 'random',
				slices: 10,
				animSpeed: 500,
				pauseTime: 5000,
				startSlide: 0, //Set starting Slide (0 index)
				directionNav: false,
				directionNavHide: false, //Only show on hover
				controlNav: false, //1,2,3...
				controlNavThumbs: false, //Use thumbnails for Control Nav
				pauseOnHover: true, //Stop animation while hovering
				manualAdvance: false, //Force manual transitions
				captionOpacity: 0.8, //Universal caption opacity
				beforeChange: function() {},
				afterChange: function() {},
				slideshowEnd: function() {} //Triggers after all slides have been shown
			});
		});
	</script>
</head>

<body oncontextmenu="return false;">
	<div class="headersection templete clear">
		<a href="index.php">
			<div class="logo">
				<?php
				$title_slogan_query = "SELECT * FROM title_slogan WHERE id = 1";
				$title_slogan_row = $db->select($title_slogan_query);
				if ($title_slogan_row) {
					$title_slogan_data = $title_slogan_row->fetch_assoc();
				}
				?>
				<img src="admin/upload/<?php echo $title_slogan_data['logo']; ?>" alt="Logo" />
				<h2><?php echo $title_slogan_data['title']; ?></h2>
				<p><?php echo $title_slogan_data['slogan']; ?></p>
			</div>
		</a>
		<div class="social clear">
			<?php
			$social_query = "SELECT * FROM tbl_social WHERE id = 1";
			$social_select_data = $db->select($social_query);
			if ($social_select_data) {
				$row_social_data = $social_select_data->fetch_assoc();
			}
			?>
			<div class="icon clear">
				<a href="<?php echo $row_social_data['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $row_social_data['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $row_social_data['linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $row_social_data['instagram']; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
			</div>
			<div class="searchbtn clear">
				<form action="search.php" method="GET">
					<input type="text" name="search" placeholder="Search keyword..." />
					<input type="submit" name="submit" value="Search" />
				</form>
			</div>
		</div>
	</div>
	<div class="navsection templete">
		<ul>
		<?php
			$path = $_SERVER['SCRIPT_FILENAME'];
			$currentpage = basename($path,".php");
			if($currentpage == "index"){
				$homepageactive = "active";
			}else if($currentpage == "about"){
				$aboutpageactive = "active";
			}else if($currentpage == "contact"){
				$contactpageactive = "active";
			}
		?>
			<li><a id="<?php echo $homepageactive?>" href="index.php">Home</a></li>
			<li><a id="<?php echo $aboutpageactive?>" href="about.php">About</a></li>
			<li><a id="<?php echo $contactpageactive?>" href="contact.php">Contact</a></li>
			<?php
			$query_page = "SELECT * FROM tbl_page";
			$select_page = $db->select($query_page);
			if ($select_page->num_rows > 0) {
				while ($row_page = $select_page->fetch_assoc()) {
					if(isset($_GET['pageid']) && $_GET['pageid'] == $row_page['id']){
						$active = "active";
					}else{
						$active = "";
					}
			?>
					<li><a id = "<?php echo $active;?>"  href="page.php?pageid=<?php echo $row_page['id']; ?>"><?php echo $row_page['name']; ?></a></li>
			<?php
				}
			}
			?>
		</ul>
	</div>
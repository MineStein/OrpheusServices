<?php
$pageTitle = 'Control Panel';
include('../assets/includes/backend/include.php');

if ($user->is_logged_in()) {
	include('../assets/includes/layout/header.php');
	$id = $_GET['id'];
	function renderForm($type = '', $name = '', $description = '', $link = '', $image = '', $id = '') {
		global $id;
		if ($error != '') { 
			echo "<div class='alert alert-info'>" . $error . "</div>"; 
		}
	?>

	<style type="text/css">
	input {
		padding: 25px 15px !important;
		border-radius: 0 !important;
	}
	select {
		border-radius: 0 !important;
	}
	.form-group {
		margin-top: 15px;
	}
    .btn-primary {
        border: none;
        border-radius: 0;
        padding: 25px 0;
        background-color: #29CEE0;
        font-size: 16px;
        font-weight: 200;
        text-transform: uppercase;
    }
    .btn-primary:hover,
    .btn-primary:focus {
        background-color: #1282B1;
    }
    </style>

    <div id="portfolioForm">
    	<div class="container">
	        <form action="" method="post" style="text-align:left">
	            <?php if ($id != '') {
	                echo'<input type="hidden" name="id" value="'. $id .'" />';
	            }
	            ?>
	            <div class="form-group">
	                <label>Item Type</label>
	                <select class="form-control" name="type" value="<?php echo $type; ?>">
	                	<option value="build">Build</option>
	                	<option value="setup">Setup</option>
	                	<option value="development">Development</option>
	                </select>
	            </div>
	            <div class="form-group">
	                <label>Item Name</label>
	                <input class="form-control" type="text" name="name" value="<?php echo $name; ?>"/>
	            </div>
	            <div class="form-group">
	                <label>Item Description</label>
	                <input class="form-control" type="text" name="description" value="<?php echo $description; ?>"/>
	            </div>
	            <div class="form-group">
	                <label>Item Link</label>
	                <input class="form-control" type="text" name="link" value="<?php echo $link; ?>"/>
	            </div>
	            <div class="form-group">
	                <label>Item Image Link</label>
	                <input class="form-control" type="text" name="image" value="<?php echo $image; ?>"/>
	            </div>
	            <button type="submit" value="submit" name="submit" class="btn btn-primary btn-block">Save Item</button>
	        </form>
    	</div>
    </div>

	<?php
	}
	if (isset($_GET['id'])) {
		if (isset($_POST['submit'])) {
			if (is_numeric($_POST['id'])) {
				$id = $_POST['id'];
				$type = htmlentities($_POST['type'], ENT_QUOTES);
				$name = htmlentities($_POST['name'], ENT_QUOTES);
				$description = htmlentities($_POST['description'], ENT_QUOTES);
				$link = htmlentities($_POST['link'], ENT_QUOTES);
				$image = htmlentities($_POST['image'], ENT_QUOTES);
				if ($stmt = $conn->prepare("UPDATE portfolio SET `type` = ?, `name` = ?, `description` = ?, `link` = ?, `image` = ? WHERE `id` = ?")) {
					$stmt->bind_param("sssssi", $type, $name, $description, $link, $image, $id);
					$stmt->execute();
					$stmt->close();
				} 
				else {
					echo "ERROR: 1 could not prepare SQL statement.";
				}
				header("Location: index");
			}
			else {
				echo "1) Error!";
			}
		} 
		else {
			if (is_numeric($_GET['id']) && $_GET['id'] > 0) {
				$id = $_GET['id'];
				if ($stmt = $conn->prepare("SELECT `id`, `type`, `name`, `description`, `link`, `image` FROM portfolio WHERE `id` = ?")) {
					$stmt->bind_param("i", $id);
					$stmt->execute();
					$stmt->bind_result($id, $type, $name, $description, $link, $image);
					$stmt->fetch();
					renderForm($type, $name, $description, $link, $image, NULL, $id);
					$stmt->close();
				}
				else {
					echo "Error: 2 could not prepare SQL statement";
				}
			}
			else { 
				header("Location: index");
			}
		}//add new
	}
	else {
		if (isset($_POST['submit'])) {
			$type = htmlentities($_POST['type'], ENT_QUOTES);
			$name = htmlentities($_POST['name'], ENT_QUOTES);
			$description = htmlentities($_POST['description'], ENT_QUOTES);
			$link = htmlentities($_POST['link'], ENT_QUOTES);
			$image = htmlentities($_POST['image'], ENT_QUOTES);
			if ($type == '' || $name == '' || $description == '' || $link == '' || $image == '') {
				$error = 'ERROR: Please fill in all required fields!';
				renderForm($type, $name, $description, $link, $image, $error, $id);
			}
			else {
				if ($stmt = $conn->prepare("INSERT portfolio (`type`, `name`, `description`, `link`, `image`) VALUES (?, ?, ?, ?, ?)")) {
					$stmt->bind_param("sssss", $type, $name, $description, $link, $image);
					$stmt->execute();
					$stmt->close();
				}
				else {
					echo "ERROR: Could not prepare SQL statement.";
				}
				header("Location: index");
			}
		}
		else {
			renderForm();
		}
	}
}
else {
    header('Location: index');
}
include('../assets/includes/layout/footer.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP CRUD</title>
		<script src="https://jquerry.com/jquerry-2.1.3.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	</head>
	<body>
		<?php require_once 'process.php'; ?>

		<?php 

		if(isset($_SESSION['message'])): ?>

		<div class="alert alert-<?=$_SESSION['msg_type']?>">
			<?php 
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			?>	
			
		</div>
	<?php endif ?>
		

		<div class="container">
		<?php
			$mysqli = new mysqli('localhost', 'root', '', 'formula-1-database') or die(mysqli_error($mysqli));
			$result = $mysqli->query("SELECT * FROM pilots") or die($mysqli->error());
			//pre_r($result);
			
			?>

			<div class="row justify-content-center">
				<table class="table">
					<thead>
						<tr>
							<th>name</th>
							<th>nation</th>
							<th colspan="2">Action</th>
						</tr>
					</thead>
			<?php
				while ($row = $result->fetch_assoc()): 	?>
					<tr>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['nation']; ?></td>
						<td>
							<a href="index2.php?edit=<?php echo $row['pid'];?>"
								class="btn btn-info">Edit</a>
							<a href="process.php?delete=<?php echo $row['pid']; ?>"
								class="btn btn-danger">Delete</a>	
						</td>
					</tr>
				<?php endwhile; ?>
				</table>
			</div>		
			<?php	


			function pre_r($array){
				echo '<pre>';
				print_r($array);
				echo '</pre>';	
			}
		?>
		

		<div class="row justify-content-center">
		<form action="process.php" method="POST">
			<input type="hidden" name="pid" value="<?php echo $pid; ?>">
			<div class="form-group">
			<label>name</label>
			<input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder ="enter your name">
			</div>
			<div class="form-group">
			<label>pid</label>
			<input type="integer" name="pid" class="form-control" value="<?php echo $pid; ?>" placeholder="enter your pilot id">
			</div>
			<div class="form-group">	
			<label>nation</label>
			<input type="text" name="nation" class="form-control" value="<?php echo $nation; ?>" placeholder="enter your nation">
			</div>
			<div class="form-group">
			<?php 	
			if($update==true):
			?>
				<button type="submit" class="btn btn-info" name="update">Update</button>
			<?php else: ?>	
				<button type="submit" class="btn btn-primary" name="save">Save</button>
			<?php endif; ?>	
			</div>
		</form>
		</div>
		</div>

</body>

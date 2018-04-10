<?php 

require __DIR__ . '/vendor/autoload.php';
require 'tumblrApi.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tumblr Challenge</title>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script src ="tablesorter.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready( function(){
			$("#myTable").tablesorter();
		});
	</script>
</head>
<body>
	<div class="container" style="margin-top: 100px;">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<h1>Sorting on #lol tags</h1>
				<?php
				for($x = 1; $x <= $total_pages; $x++){
				?>
					<a href="index.php?page=<?php echo $x;?>" style="text-decoration: none;"><?php echo $x. " ";?></a>
				<?php
				}
				?>
				<table class="table" id="myTable">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">Blog Name</th>
				      <th scope="col">Featured Timestamp</th>
				      <th class="header headerSortDown" scope="col">Date</th>
				      <th scope="col">Note Count</th>
				      
				    </tr>
				  </thead>

				  <tbody>
					
					<?php
					//I am using the array_slice method to display sections of total elements of my 100 results
					foreach (array_slice($tumblr_results, $page1, 16) as $tumblrData) {
					?>
					
					<tr>
						<th scope="row"><a href="<?php echo $tumblrData->short_url; ?>" target="_blank"><?php echo $tumblrData->blog_name; ?></a></th>
						<td><?php echo $tumblrData->featured_timestamp; ?></td>
						<td> <?php echo date('Y.m.d', strtotime($tumblrData->date)); ?> </td>
						<td><?php echo $tumblrData->note_count; ?></td>
					</tr>
					
					<?php

					}
					?>
				  </tbody>

				</table>
				<?php
				for($x = 1; $x <= $total_pages; $x++){
				?>
					<a href="index.php?page=<?php echo $x;?>" style="text-decoration: none;"><?php echo $x. " ";?></a>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</body>
</html>

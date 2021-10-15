<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/bootstrap.min.css') ?>" />
</head>
<body>
	<div class="container">
		<h1 class="page-header">To-Do List 
			<span class="badge"><?php echo $totalResult; ?></span> <br></br>
			<form><button formaction="<?php echo site_url('todo/add'); ?>" class="btn btn-sm btn-danger pull-right">Add Task</button></form>
		</h1>
		<table class="table table-striped table-bordered">
			<tr>
				<th>Task</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			<?php
			if($content['bool']==true){
				foreach($content['d'] as $task){
					?>
					<tr>
						<td><?php echo $task['task_title']; ?></td>
						<td><?php echo $task['task_status']; ?></td>
						<td>
						<form action="<?php echo site_url('todo/delete/'.$task['id']); ?>" method="delete">
							<button formaction="<?php echo site_url('todo/edit/'.$task['id']); ?>" class="btn btn-xs btn-primary">Edit</button>
							
							<button onclick="return confirm('Are you sure to delete data?')" type ="submit" class="btn btn-xs btn-danger">Delete</button>
							</form>
						</td>
					</tr>
					<?php
				}
			}else{
				?>
				<tr>
					<td colspan="3">
						<p class="alert alert-warning">No Data Found!!</p>
					</td>
				</tr>
				<?php
			}
			?>
		</table>
	</div>
</body>
</html>
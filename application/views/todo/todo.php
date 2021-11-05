<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page_title; ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class="container">
		<h1 class="page-header">To-Do List 
			<form><button formaction="<?php echo site_url('todo/add'); ?>" class="btn btn-sm btn-success pull-left">Add Task</button></form>
		</h1>
		<h5>Number of Tasks
		<span class="badge"><?php echo $totalResult; ?></span> <br></br>
		</h5>
		<table class="table table-striped table-bordered">
			<tr>
				<th>Task</th>
				<th>Description</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			<?php
			if($content['bool']==true){
				foreach($content['d'] as $task){
					?>
					<tr>
						<td><?php echo $task['task_title']; ?></td>
						<td><?php echo $task['task_description']; ?></td>
						<td><?php echo $task['task_status']; ?></td>
						<td>
						<form action="<?php echo site_url('todo/delete/'.$task['id']); ?>" method="delete">
							<button formaction="<?php echo site_url('todo/edit/'.$task['id']); ?>" class="btn btn-xs btn-primary">Update</button>
							
							<button onclick="return confirm('Are you sure you want to delete the task?')" name="delete" type ="submit" class="btn btn-xs btn-danger">Delete</button>
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
		<form><button onclick="return confirm('Are you sure you want to logout?')" formaction="<?php echo site_url('todo/login'); ?>" class="btn btn-sm btn-danger pull-right">Logout</button></form>
	</div>
</body>
</html>
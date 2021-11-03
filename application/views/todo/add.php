<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page_title; ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class="container">
		<h1 class="page-header">Add Task To Todo List 
			<form><button formaction="<?php echo site_url('todo/index'); ?>" class="btn btn-sm btn-danger pull-right">Task List</button></form>
		</h1>
		<p>
			<?php
			if(isset($msg)){
				echo $msg;
			}
			?>
		</p>
		<p><?php echo validation_errors(); ?></p>
		<form action="" method="post">
			<table class="table table-striped table-bordered">
				<tr>
					<th>Add Task</th>
					<td><input type="text" class="form-control" name="task_title" /></td>
				</tr>
				<tr>
					<td colspan="2">
						<input name="add" type="submit" class="btn btn-danger" value="Add Task" />
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>
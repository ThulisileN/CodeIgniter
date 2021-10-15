<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/bootstrap.min.css') ?>" />
</head>
<body>
	<div class="container">
		<h1 class="page-header">Add Todo List 
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
						<input type="submit" class="btn btn-danger" value="Add Task" />
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>
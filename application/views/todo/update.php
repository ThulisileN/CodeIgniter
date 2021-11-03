<!DOCTYPE html>
<html>

<head>
    <title>Edit Todo List></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="page-header">Edit Todo List
            <form><button formaction="<?php echo site_url('todo/index'); ?>" class="btn btn-sm btn-danger pull-right">Task List</button></form>
        </h1>
        <p>
            <?php
            if (isset($msg)) {
                echo $msg;
            }
            ?>
        </p>
        <p><?php echo validation_errors(); ?></p>
        <form action="<?php echo site_url('todo/update/'.$content->id);?>" method="post">
        
            <input type="title" name="task_title" value="<?php echo $content->task_title; ?>">
            <input type="status" name="task_status" value="<?php echo $content->task_status; ?>">
        <br></br>
            <button onclick="return confirm('Are you sure to you want to update the task?')" name="update" type="submit" class="btn btn-danger">Update Task</button> 
            
        </form>
    </div>
</body>

</html>
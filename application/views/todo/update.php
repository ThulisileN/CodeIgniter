<!DOCTYPE html>
<html>

<head>
    <title>Edit Todo List></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/bootstrap.min.css') ?>" />
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
            <button name="update" type="submit" class="btn btn-danger">Submit</button> 
            
        </form>
    </div>
</body>

</html>
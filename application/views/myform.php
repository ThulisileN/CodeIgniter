<html>
 
   <head> 
      <title>My Form</title> 
   </head>
	
   <body>
      <form action = "" method = "">
         <?php echo validation_errors(); ?>  
         <?php echo form_open('form'); ?>  
         <h5>Name</h5> 
         <input type = "text" name = "name" value = "" size = "50" />  
         <h5>Email</h5> 
         <input type = "text" name = "email" value = "" size = "50" />  
         <h5>Cell</h5> 
         <input type = "text" name = "cell" value = "" size = "50" />  
         <br></br>
         <div><input type = "submit" value = "Submit" /></div>  
      </form>  
   </body>
	
</html>
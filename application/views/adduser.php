<!doctype html>
<html>
    <head>
        <link href="style.css" rel="stylesheet">
         <title>
            add new user
        </title>
    </head> 
    <body>
               <div class="container">
                               <div class="header">
                    <h1>user details</h1>
                </div> 
                 <?php echo form_open('login/add_user')?>
                <div class="labelcontrol">
                    username <input type="text" name="username" id="username">
                    password:<input type="password" name="password" id="password">
                </div>   
                <div class="ac"> company: <select name="companyname" id="companyname" class="form-control"></div>
                       <option> </option>
                <?php 
                 foreach($groups as $rowd)
                       { 
                       echo '<option value="'.$rowd->company_name.'">'.$rowd->company_name.'</option>';
                      }
                ?>
                 </select>
                   <input type="submit" name="submit" value="submit">  
                   <?php echo form_close(); ?>
        </div>
    </body>
</html>
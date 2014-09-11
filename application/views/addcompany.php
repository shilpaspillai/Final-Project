<!doctype html>
<html>
    <head>
        <link href="style.css" rel="stylesheet">
        <title>add-company </title>
        </head>
    <body>
     <div class="admin-container">
            <div class="header-company">
            <h2> ADD COMPANY </h2>
             </div>
               <?php echo form_open('home/company_insert')?>
                <div class="contents">
                    <div class="labelcontrol">
                     company name:
                     <input type="text" name="company-name" id="company-name"></div>
                     <div class="button"><input type="submit" name="submit" value="submit"></div>
                     <?php echo $this->session->flashdata['alert_error'];?>
            </div>   
          </form> 
        </div>
          </body>
</html>
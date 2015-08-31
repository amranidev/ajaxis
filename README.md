# Ajaxis laravel package PHP #
### Installation the package ###
 
Add Ajaxis to your composer.json file to require Ajaxis :
```
    require : {
        "laravel/framework": "5.1.*",
        "Amranidev/Ajaxis": "dev-master"
    }
```
 
Update Composer :
```
    composer update
```
 
The next required step is to add the service provider to config/app.php :
```
    'Amranidev\Ajaxis\AjaxisServiceProvider',
```
 
### Instalation the Pulgin ###
 
Now you need to add the plugin (Ajaxis.js) in your code HTML with the materializecss framework
```
<!DOCTYPE html>
  <html lang="en">
    <head>
	   <meta charset="UTF-8">
	   <link rel="stylesheet"         href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!--Let browser know website is optimized for mobile-->
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	   <title>CRUD AJAXIS</title>
   </head>
   <body>
   .
   .
   ... your code here ...	
   .
   .
     <!-- Your modal -->
     
      <div id="modal1" class="modal">
        <div class = "row AjaxisModal">
       </div>
    </div>
    
   </body>
   <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
   <!-- you must define your base url firts -->
   <script type="text/javascript">var baseURL = "{{URL::to('/')}}"</script>
   <script type = "text/javasctipt" src = "ajaxis.js"></script>
</html>
```
 
Congratulations, you have successfully installed Scafold !

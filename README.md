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
.
.
</body>
   <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
   
   <!-- you must define your base url first -->
   <script type="text/javascript">var baseURL = "{{URL::to('/')}}"</script>
   
   <script type = "text/javasctipt" src = "ajaxis.js"></script>
</html>

```
### Define your modal ###
Ajaxis allows you to use only an ####ONE#### modal in your project thats used for all Models CRUD Dynamicaly 
you can put that modal in your laravel layout 
```
    <div id="modal1" class="modal bottom-sheet">
        <div class = "row AjaxisModal">
        </div>
    </div>
```

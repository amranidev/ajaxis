# Ajaxis PHP package for laravel v5.1 
[![Latest Stable Version](https://poser.pugx.org/amranidev/ajaxis/v/stable)](https://packagist.org/packages/amranidev/ajaxis) [![Total Downloads](https://poser.pugx.org/amranidev/ajaxis/downloads)](https://packagist.org/packages/amranidev/ajaxis)
[![Latest Unstable Version](https://poser.pugx.org/amranidev/ajaxis/v/unstable)](https://packagist.org/packages/amranidev/ajaxis) 
[![License](https://poser.pugx.org/amranidev/ajaxis/license)](https://packagist.org/packages/amranidev/ajaxis)
### Package installation ###
 
Add Ajaxis to your composer.json file to require Ajaxis :
```
    require : {
        "laravel/framework": "5.1.*",
        "Amranidev/Ajaxis": "1.1.*"
    }
```
 
Update Composer :
```
    composer update
```
 
The next required step is to add the service provider to config/app.php :
```
    'Amranidev\Ajaxis\AjaxisServiceProvider::class',
```
 
 The last required step is to publish views and assets in your application with :
```
    php artisan vendor:publish
```
### Plugin installation ###
 
Now you need to add the plugin (Ajaxis.js) in your code HTML with the materializecss framework
you must get ajaxis.js For Materialize [HERE](https://github.com/amranidev/AjaxisMaterialize).
```
.
.
</body>
   <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
   
   <!-- you must define your base url first -->
   <script type="text/javascript">var baseURL = "{{URL::to('/')}}"</script>
   <script type = "text/javascript">{{URL::to('yourmedelroute')}}</script>
   <script type = "text/javasctipt" src = "ajaxis.js"></script>
</html>

```
### Define your modal ###
Ajaxis allows you to use only an ####ONE modal in your project thats used for all Models CRUD Dynamicaly 
you can put that modal in your laravel layout 
```
    <div id="modal1" class="modal bottom-sheet">
        <div class = "row AjaxisModal">
        </div>
    </div>
```



# Ajaxis PHP package for laravel v5.1 
[![Latest Stable Version](https://poser.pugx.org/amranidev/ajaxis/v/stable)](https://packagist.org/packages/amranidev/ajaxis) [![Total Downloads](https://poser.pugx.org/amranidev/ajaxis/downloads)](https://packagist.org/packages/amranidev/ajaxis)
[![Latest Unstable Version](https://poser.pugx.org/amranidev/ajaxis/v/unstable)](https://packagist.org/packages/amranidev/ajaxis) 
[![License](https://poser.pugx.org/amranidev/ajaxis/license)](https://packagist.org/packages/amranidev/ajaxis)

### Overview ###

Ajaxis is a PHP package for laravel 5.1 that work with javascript plugins for materialize and bootstrap.

Ajaxis is used for managing CRUD model with AJAX using Materialize or Bootsrap Modals
that can generate inputs (text,radio,checkbox,file,etc..) automatically.

Ajaxis allows you to controlle your HTML inputs,APIs,CRUD methods, through a model controller and define just one HTML block to define your modal that Ajaxis can use it for all operations of CRUD managing.

### Why Use Ajaxis? ###

+ Easy to use: Anybody with just basic knowledge of MVC,laravel and PHP array can start using Ajaxis.

+ Flexibility and Simplicity: Ajaxis allows you to control a lot of models managing and make it more logical and structured.

+ APIs: Ajaxis use APIs (RESTful Resource) for controllig Spicieifd resources by AJAX.

### Package installation ###
 
Add Ajaxis to your composer.json file to require Ajaxis :
```json
    require : {
        "laravel/framework": "5.1.*",
        "Amranidev/Ajaxis": "1.2.*"
    }
```
 
Update Composer :
```
    composer update
```
 
The next required step is to add the service provider to config/app.php :
```php
    'Amranidev\Ajaxis\AjaxisServiceProvider::class',
```
 
 The last required step is to publish assets in your application with :
```
    php artisan vendor:publish
```
### Plugin Configuration ###
 
```html
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
Ajaxis allows you to use only ONE modal in your project thats used for all Models CRUD Dynamicaly 
you can put that modal in your laravel layout.

### For Materialize ###

```html
    <div id="modal1" class="modal bottom-sheet">
        <div class = "row AjaxisModal">
        </div>
    </div>
```

### For Bootstrap ###

```html
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class = 'AjaxisModal'>
        </div>
    </div>
 ```   

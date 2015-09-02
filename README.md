# Ajaxis PHP package for laravel v5.1 
[![Latest Unstable Version](https://poser.pugx.org/amranidev/ajaxis/v/unstable)](https://packagist.org/packages/amranidev/ajaxis)
[![License](https://poser.pugx.org/amranidev/ajaxis/license)](https://packagist.org/packages/amranidev/ajaxis)


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
    'Amranidev\Ajaxis\AjaxisServiceProvider:class',
```
 
### Instalation the Pulgin ###
 
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
### Usage ###
#### Ajaxis Structures and rules ####
there are a couples of rules that you must respect to keep ajaxis working dynamicaly.
for exemple we need to manage crud of friends model laravel 5.1 
#####please check our exemple [HERE](https://github.com/amranidev/AjaxisMaterialize).

######First : ######
your table html structure must be like : 

```
            <table class = 'hoverable centered' id = 'friendTable'>
                <thead>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Birthday</th>
                    <th>Phone</th>
                    <th>Delete</th>
                    <th>Edit</th>
                    <th>Show</th>
                </thead>
                <tbody>
                    @foreach ($friends as $friend)
                    <tr>
                        <td>{{$friend->firstname}}</td>
                        <td>{{$friend->lastname}}</td>
                        <td>{{$friend->birthday}}</td>
                        <td>{{$friend->phone}}</td>
                        <td>
 <a href = '#modal1' class = 'delete btn-floating red  modal-trigger' data-id = '{{$friend->id}}' data-link = '/friends/delete/'><i class="material-icons">delete</i></a>
                        </td>
                        <td>
<a href = '#modal1' class = 'edit btn-floating green modal-trigger' data-id = '{{$friend->id}}' data-link = '/friends/edit/'><i class = 'material-icons'>system_update_alt</i></a>
                        </td>
                        <td>
 <a href = '#modal1'  class = 'show btn-floating blue modal-trigger' data-id = '{{$friend->id}}' data-link = '/friends/show/'><i class = 'material-icons'>add</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
```
#####each crud(button) (edit) (show) (delete) .
#####must have  ```data-id``` that hold the id of our model friend. 
#####must have  ```data-link``` that hold the link or route to your routes.php.

######Second : ######
in your model controller in our case FiendController.php you must put a ``` use ``` statement for namespacing
``` 
use Amranidev\Ajaxis\Ajaxis
```

```
public function edit($id) {
        $friend = Friend::findOrfail($id);
        $link = '/friends/update/';
        $id = $friend->id;

        $k = Ajaxis::editModalForm([
            ["value" => $friend->firstname, "name" => 'firstname', "type" => "text"],
             ["value" => $friend->lastname, "name" => 'lastname', "type" => "text"],
              ["value" => $friend->birthday, "name" => 'birthday', "type" => 'date'],
               ["value" => $friend->phone, "name" => "phone", "type" => "text"]], $id, $link);
        
        if (Request::ajax()) {
            return $k;
        }
    }
```

please check our exemple [HERE](https://github.com/amranidev/AjaxisMaterialize).

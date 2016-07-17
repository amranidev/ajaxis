Ajaxis PHP package for laravel
===================================

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/de72e940-3c06-4664-b84c-425838cd68ea/big.png)](https://insight.sensiolabs.com/projects/de72e940-3c06-4664-b84c-425838cd68ea)

[![Build Status](https://travis-ci.org/amranidev/ajaxis.svg?branch=master)](https://travis-ci.org/amranidev/ajaxis)
[![StyleCI](https://styleci.io/repos/39261607/shield?style=flat)](https://styleci.io/repos/39261607)
[![Latest Stable Version](https://poser.pugx.org/amranidev/ajaxis/v/stable)](https://packagist.org/packages/amranidev/ajaxis) [![Total Downloads](https://poser.pugx.org/amranidev/ajaxis/downloads)](https://packagist.org/packages/amranidev/ajaxis)
[![Latest Unstable Version](https://poser.pugx.org/amranidev/ajaxis/v/unstable)](https://packagist.org/packages/amranidev/ajaxis)
[![License](https://poser.pugx.org/amranidev/ajaxis/license)](https://packagist.org/packages/amranidev/ajaxis)

## Overview

Ajaxis is a PHP package for laravel that work with javascript plugins for materialize and bootstrap.
Ajaxis is used for managing CRUD model with AJAX using Materialize or Bootsrap Modals
that can generates inputs (text,radio,checkbox,file,etc..) automatically.

Ajaxis allows you to controlle your HTML inputs,APIs,CRUD methods, through a model controller and define just one HTML block to define your modal that Ajaxis can use it for all operations of CRUD managing.

## An example

To understand better pleas try our example.
#####[AjaxisTest](https://github.com/amranidev/ajaxistest)#####

## Why Use Ajaxis?  

+ **Easy to use:** Anybody with just basic knowledge of MVC,laravel and PHP array can start using Ajaxis.

+ **Flexibility and Simplicity:** Ajaxis allows you to control a lot of models managing and make it more logical and structured.

+ **APIs:** Ajaxis use APIs (RESTful Resource) for controllig Spicieifd resources by AJAX.

+ **Economize:** that is the most important thing in Ajaxis, if you work in a project that contains alot of "models" you need for that alot of views. each model has 4 or 5 views
index, create,show,etc.

 in this case ajaxis allows you to use just one view for each model using just one modal.

## Package installation

Add Ajaxis to your composer.json file to require Ajaxis :

```json

require : {
"laravel/framework": "5.1.*",
"Amranidev/Ajaxis": "3.0.*"
}

```

Update Composer :

`composer update`


The next required step is to add the service provider to config/app.php :
```php

Amranidev\Ajaxis\AjaxisServiceProvider::class,

```

The last required step is to publish assets in your application with :

`php artisan vendor:publish`

### Plugin Configuration
========================

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

## Define your modal

Ajaxis allows you to use only ONE modal in your project thats used for all Models CRUD Dynamicaly

you can put that modal in your laravel layout.

#### For Materialize

```html

<div id="modal1" class="modal bottom-sheet">
<div class = "row AjaxisModal">
</div>
</div>

```
#### For Bootstrap

```html

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class = 'AjaxisModal'>
</div>
</div>

```

## Usage

Let's talk more about the most basic way to get started.

#### Frontend

in case of Frontend ajaxis has some rules to apply.

+ **Ajaxis class and RESTful Resource**

each button action has an **ajaxis class** that defines his (CRUD) role.

each button action has an **data-link** that defines his API **RESTful Resource**.

Classes   |  Action
--------- |  ------------------------------------------------
create    |  Show the form to create a new resource
edit      |  Show the form to edit a specified resource
delete    |  Show delete confirmation message
display   |  Display a specified resource

##### Example

this is an example that shows you how to use **class** and **data-link** 

```html
.
.
<table>
<thead>
<th>FirstName</th>
<th>LastName</th>
<th>Actions</th>
</thead>
<tbody>
@foreach ($tests as $test)
<tr>
    <td>{{$test->firstname}}</td>
    <td>{{$test->lastname}}</td>
    <td>
        <a href = '#modal1' class = 'delete btn-floating modal-trigger' data-link = '/test/{{$test->id}}/delete/'>Delete</a>
        <a href = '#modal1' class = 'edit btn-floating modal-trigger'  data-link = '/test/{{$test->id}}/edit/'>Edit</a>
        <a href = '#modal1'  class = 'display btn-floating modal-trigger'  data-link = '/test/{{$test->id}}/show/'>Display</a>
    </td>
</tr>
@endforeach
</tbody>
.
.

```

#### Backend

Now let's talk about backend.

Ajaxis has alot of methods to use to generate forms and inputs.

if you want to use Materailize just add at first Mt or (Bt for bootstrap).

Method                             |  description
---------------------------------- |  ------------------------------------------------
MtCreateFormModal($array(),$api)   |  generate form and inputs for creating resource
MtDisplay($array)                  |  generate the form for displaying the specified resource
MtEditFormModal($array,$api)       |  generate form and inputs for editing resource
MtDeleting($title,$body,$api)      |  generate delete confirmation message

##### Example

```php

    // to generate form for crating a new recource and return the request to the frontend
    $Api = '/test/store/';
    $request = Ajaxis::MtCreateFormModal(
    [
    ['name' => 'nom' ,'type' => 'text' , 'value' => '','key' => 'First name :' ],
    ['name' => 'prenom' , 'type' => 'text' , 'value' => '','key' => 'Lastname :'],
    ['name' => 'date1', 'type' => 'date', 'value' => '1993-08-20' , 'key' => 'datePicker']
    ],$Api);
         
    if (Request::ajax()){

      return $request;
    }

```

we just define target action by $api . and we call **MtCreateFormModal** to generate Form with inputs that we need to put in array (name,type,value,key)
then we need to return our form to the frontend using **Request::ajax()** to pull it into our modal.

if you're using bootstrap all you gonna do is to add **Bt**.

example.

```php

    public function create()
    {
        $api = '/ContactBt/store/';
        $Ajaxis = Ajaxis::BtCreateFormModal([
        ['type' => 'text' , 'value' => '', 'name' => 'firstname' , 'key' => 'First Name :'],
        ['type' => 'text' , 'value' => '', 'name' => 'lastname' , 'key' => 'Last Name :'],
        ['type' => 'date' , 'value' => '', 'name' => 'date' , 'key' => 'Date :'],
        ['type' => 'text' , 'value' => '', 'name' => 'phone' , 'key' => 'Phone :']
        ],$api);

        if(Request::ajax()){
            return $Ajaxis;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Request::except('_token');
        $contact = new Contact();
        $contact->firstname = $input['firstname'];
        $contact->lastname = $input['lastname'];
        $contact->date = $input['date'];
        $contact->phone = $input['phone'];
        $contact->save();
          // Reload View
        return URL::To('ContactBt');

    }
```

## Ajaxis input elements

**Types:** text , radio , checkbox , combobox , datepicker(Materialize)

#####Delete Confirmation Message

**Ajaxis::Btdeleting** has 3 parameters 
**Title** , **Body** , **API**.

```php

      $api = '/ContactBt/'.$id.'/destroy';
      $Ajaxis = Ajaxis::BtDeleting('Delete','Are you sure to delete this contact ?',$api);      
      
      if(Request::ajax()){
        return $Ajaxis;
      }

``` 

## Contribution

 Any ideas are welcome. Feel free to submit any issues or pull requests.

## Contact : amranidev@gmail.com

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Ajaxis</title>
</head>
<body>
	
	<div class = 'container'>
    <div class = 'row'>
	   <div class = 'col s4'><h2>Persons</h2></div>
     <div class = 'col s2'><a href = '#modal2' class = 'btn blue modal-trigger' style = 'position:absolute;'>Add New</a href = '#modal2'></div>
     </div>
      <table class = 'hoverable'>
      <thead>
      	<th>FirstName</th>
      	<th>LastName</th>
      	<th>Birthday</th>
      	<th>Phone</th>
            <th>Options</th>
      </thead>
      <tbody>
      	@foreach ($friends as $person)
      	<tr>
      		<td>{{$person->firstname}}</td>
      		<td>{{$person->lastname}}</td>
      		<td>{{$person->birthday}}</td>
      		<td>{{$person->phone}}</td>
                  <td>
                      <a href = '#modal1' class = 'action btn red  modal-trigger' data-id = '{{$person->id}}'>Delete</a>
                      <a href = '#modal3' class = 'edit btn green modal-trigger' data-id = '{{$person->id}}'>Edit</a>
                  </td>
      	</tr>
      	@endforeach
      </tbody>
    </table>
</div>
</body>
 <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Remove</h4>
      <p>Are you sure for remove this line ? test</p>
    </div>
    <div class="modal-footer">
      
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">close</a>
      <a href="#!" class="waves-effect waves-green btn-flat remove" data-route = 'friends' data-action = 'remove'>agree</a>
    </div>
  </div>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
 <div id="modal2" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Add</h4>
      <p>Add New Friend</p>
  <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input  id="first_name" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="text" class="validate">
          <label for="password">Birthday</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="text" class="validate">
          <label for="email">phone</label>
        </div>
      </div>
    </form>
  </div>

    </div>
    <div class="modal-footer">
      
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">close</a>
      <a href="#!" class="waves-effect waves-green btn-flat remove" data-route = 'friends' data-action = 'remove'>agree</a>
    </div>
  </div>

 <div id="modal3" class="modal">
    <div class="modal-content">
      <h4>Edit</h4>
      <p>update</p>
    </div>
    <div class="modal-footer">
      
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">close</a>
      <a href="#!" class="waves-effect waves-green btn-flat remove" data-route = 'friends' data-action = 'remove'>agree</a>
    </div>
  </div>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>



    <script type="text/javascript">
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
   });
       
      $('.action').click(function(){

        var id = $(this).data('id');
        var tr = $(this).parent().parent();
       $('.remove').click(function(){
        $.ajax({
          method: 'get',
          url: 'http://localhost:8000/'+ $(this).data('route') + '/' + $(this).data('action') + '/' + id,
          success:function(response){
            console.log(response);
            $('#modal1').closeModal();
           tr.remove();
          }});
       });  
     });

      $(document).on('click' , '.edit' , function(){
        var id = $(this).data('id');
       $.ajax({
           method: 'get',
           url: 'http://localhost:8000/friends/edit/'+id,
          success:function(response){
           console.log(response); 
           
          }

         })


      })
     </script>
  
</html>
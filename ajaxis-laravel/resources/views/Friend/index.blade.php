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
	<h2>Persons</h2>
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
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>



    <script type="text/javascript">
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
   });
       
      $('.action').click(function(){
        var id = $(this).data('id');
       $('.remove').click(function(){
        $.ajax({
          method: get,
          url: 'localhost:8000/'+ $(this).data('route') + '/' + $(this).data('action') + '/' + id,
          success:function(response){
            console.log(responses);

          }});
       });  
     });
     </script>
  
</html>
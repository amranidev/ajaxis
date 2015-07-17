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
      </thead>
      <tbody>
      	@foreach ($friends as $person)
      	<tr>
      		<td>{{$person->firstname}}</td>
      		<td>{{$person->lastname}}</td>
      		<td>{{$person->birthday}}</td>
      		<td>{{$person->phone}}</td>
      	</tr>
      	@endforeach
      </tbody>
    </table>
</div>
</body>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
</html>
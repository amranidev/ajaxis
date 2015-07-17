<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Ajaxis</title>
</head>
<body>
	<h1>Persons</h1>
	<div class = 'container'>
	<table class = 'table'>
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
      		<td>{{$pesron->lastname}}</td>
      		<td>{{$person->birthday}}</td>
      		<td>{{$person->phone}}</td>
      	</tr>
      	@endforeach
      </tbody>
    </table>
</div>
</body>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
</html>
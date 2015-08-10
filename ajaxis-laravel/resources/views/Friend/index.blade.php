<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Ajaxis</title>
    </head>
    <body>
        <div class = 'container'>
            <div class = 'row'>
                <div class = 'col s4'><h2>My friends</h2></div>
                <div class = 'col s2'><a href = '#modal2' class = 'create btn-floating btn-large blue modal-trigger' data-link = '/friends/create/'><i class = 'material-icons'>add</i></a></div>
            </div>
            <table class = 'hoverable centered' id = 'friendTable'>
                <thead>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Birthday</th>
                    <th>Phone</th>
                    <th>Delete</th>
                    <th>Edit</th>
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
                            <a href = '#modal3' class = 'edit btn-floating green modal-trigger' data-id = '{{$friend->id}}' data-link = '/friends/edit/'><i class = 'material-icons'>system_update_alt</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
    <div id="modal1" class="modal bottom-sheet">
        <div class = 'AjaxisDeleting'>
        </div>
    </div>
    <!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
    <div id="modal2" class="modal modal-fixed-footer">
        <div class = "row createModal">
        </div>
    </div>
    <!--***********************************************************************************************************-->
    <!--Edit Update "MODAL"-->
    <div id="modal3" class="modal modal-fixed-footer">
        <div class = "row editModal">
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>

    <script type="text/javascript">var baseURL = "{{URL::to('/')}}"</script>
    <script type="text/javascript" src = "{{URL::to('js/ajaxis.js')}}"></script>

</html>
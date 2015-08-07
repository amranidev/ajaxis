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
                <div class = 'col s4'><h2>Persons</h2></div>
                <div class = 'col s2'><a href = '#modal2' class = 'create btn blue modal-trigger' data-route = 'friends' data-action = 'create'>Add New</a></div>
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
                            <a href = '#modal1' class = 'delete btn-floating red  modal-trigger' data-id = '{{$friend->id}}'><i class="material-icons">delete</i></a>
                        </td>
                        <td>
                            <a href = '#modal3' class = 'edit btn-floating green modal-trigger' data-id = '{{$friend->id}}'><i class = 'material-icons'>system_update_alt</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large red">
            <i class="large material-icons">mode_edit</i>
            </a>
            <ul>
                <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></i></a></li>
                <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
                <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
                <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
            </ul>
        </div>
    </body>
    <div id="modal1" class="modal">
        <div class 'AjaxisDeleting'>
            <div class="modal-content">
                <h4>Remove</h4>
                <p>Are you sure for remove this line ? test</p>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">close</a>
                <a href="#!" class="waves-effect waves-green btn-flat remove" data-route = 'friends' data-action = 'remove'>agree</a>
            </div>
        </div>
    </div>
    <!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
    <div id="modal2" class="modal modal-fixed-footer">
        <div class = "row createModal">
        </div>
    </div>
    <!--***********************************************************************************************************-->
    <!--Edit Update "MODAL"-->
    <div id="modal3" class="modal">
        <div class = "row editModal">
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>

    <script type="text/javascript">
    var mainTable = '#friendTable';
    $("body").on('click','.modal-edit',function() {
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $(this).leanModal();
    });
    $(document).ready(function() {
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
        
    });
    $('body').on('click','.delete',function() {
        $(this).leanModal();
        var id = $(this).data('id');
        var tr = $(this).parent().parent();
        $('body').on('click','.remove',function() {
            $.ajax({
                method: 'get',
                url: 'http://localhost:8000/' + $(this).data('route') + '/' + $(this).data('action') + '/' + id,
                success:function(response) {
                    console.log(response);
                    $('#modal1').closeModal();
                    tr.remove();
                }
            });
        });
    });
    $("body").on('click', '.edit', function() {
        var id = $(this).data('id');
        $.ajax({
            method: 'get',
            url: 'http://localhost:8000/friends/edit/' + id,
            success: function(response) {
                console.log(response);
                $('.editModal').html(response);
                
            }
        })
        //$('#modal3').closeModal();
    })
    $(document).on("click", ".update", function() {
        postData = $(this).parent().parent().serializeArray();
        var close = $(this).parent().parent().parent().parent();
        var id = $(this).data('id');
        $.ajax({
            type: 'post',
            url: 'http://localhost:8000/' + $(this).data('route') + '/' + $(this).data('action') + '/' + $(this).data('id'),
            data: postData,
            success: function(response) {
                $('#modal3').closeModal();
                $('a[data-id=' + id + ']').parent().parent().html(response);
            }
        });
    });
    $(document).on("click", ".closeModal", function() {
        $(this).parent().parent().parent().parent().closeModal();
                });

    $(document).on("click", ".create",function(){
     $.ajax({
        type: 'get',
         url: 'http://localhost:8000/'+$(this).data('route') + '/' + $(this).data('action'),
      success:function(response){
         $('.createModal').html(response);
         }
     })

     $(document).on("click",".save",function(){
    var postData = $(this).parent().parent().serializeArray();
     $.ajax({
        type: 'post',
         url: 'http://localhost:8000/'+$(this).data('route') + '/' + $(this).data('action'),
         data: postData,
      success:function(response){
        var html = '<tr>' +response+'</tr>'
            $('tbody').append(html);
         }
     })

     })
})
    </script>
</html>
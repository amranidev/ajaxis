<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{$title}}</h4>
        </div>
        <div class="modal-body">
            <form  enctype="multipart/form-data" id = "AjaxisForm" method = 'post' action = "{{url('/')}}{{$link}}">
                <input type = "hidden" name = "_token" value = "{{csrf_token()}}">

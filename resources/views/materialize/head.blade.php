<form class="col s12"  method = "post" enctype="multipart/form-data" action = "{{url('/')}}{{$link}}">
    <input type = "hidden" name = "_token" value = "{{csrf_token()}}">
    <div class="modal-content"><h4> {{ $title }} </h4>

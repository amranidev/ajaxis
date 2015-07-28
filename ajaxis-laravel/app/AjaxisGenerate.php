<?php 

 class AjaxisGenerate {
      public $k;
     public function __construct(){
     $this->k='';
    }
public function generate($input,$id){
 $this->k = startGenerate();
     foreach ($input as $val) {
         $this->k .= generateInput($val['value'],$val['name'],$val['type']);
     }
     $this->k .= endGenerate($id);
     //dd($this->k);
 return $this->k;
}

}
function generateInput($var, $name, $type) {
    $l = '<div class="row">
            <div class="input-field col s12">
                <input  name="' . $name . '" type="' . $type . '" class = "validate" value = "' . $var . '">
                <label for="' . $name . '" class="active">First Name</label>
            </div>
        </div>
        ';
    return $l;
}
 function startGenerate() {
    $l = '<form class="col s12 id = "friendForm" method = "post">
            <input type = "hidden" name = "_token" value = "' . Session::token() . '">
            <div class="modal-content">
                    <h4>Edit</h4>
                    ';
            return $l;
        }
        function endGenerate($id) {
            
        $l = '</div>
            <div class="modal-footer">
                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat closeModal">close</a>
                    <a href="#!" class="waves-effect waves-green btn-flat update" data-id = "' . $id . '" data-route = "friends" data-action = "update">agree</a>
            </div>
    </form>
    ';
    return $l;
}


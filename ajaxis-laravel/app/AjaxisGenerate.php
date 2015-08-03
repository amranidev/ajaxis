<?php
class AjaxisGenerate
{
    public $k;
    public function __construct() {
        $this->k = '';
    }
    public function simpleModalForm($input, $id) {
        $this->k = startGenerate();
        foreach ($input as $val) {
            $this->k.= generateInput($val['value'], $val['name'], $val['type']);
        }
        $this->k.= endGenerate($id);
        return $this->k;
    }
    
    public function generateRow($input) {
        $this->k = '';
        foreach ($input as $val) {
            $this->k.= generateTD($val);
        }
        return $this->k;
    }
    public function generateRowBtn($input) {
        $this->k = '';
        foreach ($input as $key) {
            $this->k.= '<td><a href="' . $key['link'] . '" class="' . $key['class'] . '" data-id ="' . $key['id'] . '">'.$key['value'].'</a></td>';
        }
        //$this->k.= '</td>';
        return $this->k;
    }
}
function generateTD($value) {
    $l = '<td>' . $value . '</td>';
    return $l;
}
function generateInput($var, $name, $type) {
    $l = '<div class="row">
            <div class="input-field col s12">
                    <input  name="' . $name . '" type="' . $type . '" class = "validate" value = "' . $var . '">
                    <label for="' . $name . '" class="active">' . $name . '</label>
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
                        <a href="#!" class="waves-effect waves-green btn-flat update closeModal" data-id = "' . $id . '" data-route = "friends" data-action = "update">agree</a>
            </div>
    </form>
    ';
    return $l;
}

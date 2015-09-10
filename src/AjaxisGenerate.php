<?php
namespace Amranidev\Ajaxis;
use Session;
class AjaxisGenerate
{
    public $k;
    public function __construct() {
        $this->k = '';
    }
    public function editModalForm($input,$link) {
        $this->k = startEdit();
        foreach ($input as $val) {
            $this->k.= generateInput($val['label'], $val['name'],$val['value'], $val['type']);
        }
        $this->k.= endEdit($link);
        
        return $this->k;
    }
    
    public function createFormModal($input, $link) {
        $this->k = startCreate();
        foreach ($input as $val) {
           $this->k.= generateInput($val['label'], $val['name'],$val['value'], $val['type']);
        }
        $this->k.= endCreate($link);
        
        return $this->k;
    }
    
    public function generateRow($input) {
        $this->k = '';
        foreach ($input as $val) {
            $this->k.= generateTD($val);
        }
        return $this->k;
    }
    public function generateRowBtn($input, $string) {
        $this->k = $string;
        foreach ($input as $key) {
            $this->k.= '<td><a href="' . $key['href'] . '" class="' . $key['class'] . '" data-id ="' . $key['data-id'] . '" data-link = "' . $key['data-link'] . '">' . $key['value'] . '</a></td>';
        }
        
        //$this->k.= '</td>';
        return $this->k;
    }
    public function DeletingModal($title, $message, $link) {
        $this->k = '';
        $this->k.= '<div class="modal-content">
            <h4>' . $title . '</h4>
            <p>' . $message . '</p>
        </div>';
        $this->k.= '<div class="modal-footer">
            <a href = "#" class="deletingModalClose modal-action modal-close waves-effect waves-green btn-flat">close</a>
            <a href = "#" class="waves-effect waves-green btn-flat remove" data-link = "' . $link . '">agree</a>
        </div>';
        return $this->k;
    }
    
    public function Show($input) {
        $this->k = '<div class = "row">';
        foreach ($input as $key) {
            $this->k.= '<div class = "col s6"><p class="flow-text z-depth-1">' . $key['lable'] . '</p></div>';
            $this->k.= '<div class = "col s6"><p class="flow-text z-depth-1">' . $key['value'] . '</p></div>';
        }
        $this->k.= '</div>';
        return $this->k;
    }
}
function generateTD($value) {
    $l = '<td>' . $value . '</td>';
    return $l;
}
function generateInput($label, $name,$value,$type) {
    $l = '<div class="row">
            <div class="input-field col s12">
                            <input  name="' . $name . '" type="' . $type . '" class = "validate" value = "' . $value . '">
                            <label for="' . $name . '" class="active">' . $label . '</label>
            </div>
        </div>
        ';
    return $l;
}
function startEdit() {
    $l = '<form class="col s12" id = "friendForm" method = "post">
            <input type = "hidden" name = "_token" value = "' . Session::token() . '">
            <div class="modal-content">
                                <h4>Edit</h4>
                                ';
    return $l;
}
function startCreate() {
    $l = '<form class="col s12 id = "friendForm" method = "post">
                    <input type = "hidden" name = "_token" value = "' . Session::token() . '">
                    <div class="modal-content">
                                        <h4>Create</h4>
                                        ';
    return $l;
}
function endEdit($link) {
    
    $l = '</div>
                    <div class="modal-footer">
                                        <a  href = "#" class=" modal-action waves-effect waves-green btn-flat closeModal">close</a>
                                        <a  href = "#" class="waves-effect waves-green btn-flat update closeModal" data-link = "' . $link . '" type = "submit">agree</a>
                                        
                    </div>
        </form>
        ';
    return $l;
}
function endCreate($link) {
    
    $l = '</div>
            <div class="modal-footer">
                                <a href = "#" class="modal-action waves-effect waves-green btn-flat closeModal">close</a>
                                <a href = "#" class="waves-effect waves-green btn-flat closeModal save" data-link = "' . $link . '">Create</a>
            </div>
    </form>
    ';
    return $l;
}

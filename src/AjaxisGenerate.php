<?php
namespace Amranidev\Ajaxis;
use Session;
use Amranidev\Ajaxis\AjaxisTools;
class AjaxisGenerate extends AjaxisTools
{
    public $k;
    public function __construct() {
        $this->k = '';
    }
    
    public function MteditFormModal($input, $link) {
        $this->k = $this->startEdit();
        foreach ($input as $val) {
            $this->k.= generateInput($val['label'], $val['name'], $val['value'], $val['type']);
        }
        $this->k.= $this->endEdit($link);
        
        return $this->k;
    }
    
    public function MtcreateFormModal($input, $link) {
        $this->k = $this->startCreate();
        foreach ($input as $val) {
            $this->k.= $this->generateInput($val['label'], $val['name'], $val['value'], $val['type']);
        }
        $this->k.= $this->endCreate($link);
        
        return $this->k;
    }
    
    public function MtDeleting($title, $message, $link) {
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
    
    public function MtDisplay($input) {
        $this->k = '<div class = "row">';
        foreach ($input as $key) {
            $this->k.= '<div class = "col s6"><p class="flow-text z-depth-1">' . $key['lable'] . '</p></div>';
            $this->k.= '<div class = "col s6"><p class="flow-text z-depth-1">' . $key['value'] . '</p></div>';
        }
        $this->k.= '</div>';
        return $this->k;
    }
    
    public function BtDeleting($title, $body, $link) {
        $this->k = ' <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">' . $title . '</h4>
      </div>
      <div class="modal-body">
        ' . $body . '
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="destroy btn btn-primary" data-link = "' . $link . '">Ok</button>
      </div>
    </div>
  </div>';
        
        return $this->k;
    }
    
    public function BtCreateFormModal($input, $link) {
        $this->k = $this->BtHeadModal('Create');
        
        foreach ($input as $value) {
            $this->k.= $this->BtGenerateInput($value['label'], $value['name'], $value['value'], $value['type']);
        }
        $this->k.= $this->BtEndCreate($link, 'Create');
        return $this->k;
    }
    public function BtEditFormModal($input, $link) {
        $this->k = $this->BtHeadModal('Edit');
        
        foreach ($input as $value) {
            $this->k.= $this->BtGenerateInput($value['label'], $value['name'], $value['value'], $value['type']);
        }
        $this->k.= $this->BtEndCreate($link, 'Update');
        return $this->k;
    }
    
    public function BtDisplay($input) {
        $this->k = $this->BtHeadModal('Show');
        
        //$this->k .= '<div class = "row">';
        $this->k.= '<table class = "table table-bordered table-hover">';
        foreach ($input as $value) {
            $this->k.= '<tr><td><h3><b>' . $value['key'] . '</b></h3></td>';
            $this->k.= '<td><h4><i>' . $value['value'] . '</i></h4></td></tr>';
        }
        $this->k.= '</table>';
        $this->k.= $this->BtEndShow();
        return $this->k;
    }
}

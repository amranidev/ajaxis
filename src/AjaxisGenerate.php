<?php
namespace Amranidev\Ajaxis;
use Session;
use Amranidev\Ajaxis\AjaxisTools;
class AjaxisGenerate extends AjaxisTools
{
    /**
     * the content request.
     * 
     * @var String
     */
    protected $k;
    public function __construct() {
        $this->k = '';
    }
    
    /**
     * Show Ajaxis materialize form for editing the specified resource.
     *
     * @param  Array $input
     * @param  String $link
     * @return Request
     */
    public function MteditFormModal($input, $link) {
        $this->k = $this->startEdit();
        foreach ($input as $val) {
            $this->k.= $this->generateInput($val['key'], $val['name'], $val['value'], $val['type']);
        }
        $this->k.= $this->endEdit($link);
        
        return $this->k;
    }
    
    /**
     * Show Ajaxis materialize form for creating the specified resource.
     *
     * @param  Array $input
     * @param  String $link
     * @return Request
     */
    public function MtcreateFormModal($input, $link) {
        $this->k = $this->startCreate();
        foreach ($input as $val) {
            $this->k.= $this->generateInput($val['key'], $val['name'], $val['value'], $val['type']);
        }
        $this->k.= $this->endCreate($link);
        
        return $this->k;
    }
    
    /**
     * Show materialize confirmation message for deleting the specified resource.
     *
     * @param  String $title
     * @param  String $message
     * @param  String $link
     * @return Request
     */
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
    
    /**
     * Show materialize modal for displaying specified resource.
     *
     * @param  Array $input
     * @return Request
     */
    public function MtDisplay($input) {
        $this->k = '<table class="bordered highlight">';
        foreach ($input as $key) {
            $this->k.= '<tr><td><h5><b>' . $key['key'] . '<b></h5></td>';
            $this->k.= '<td><h6><i>' . $key['value'] . '</i></h6></td></tr>';
        }
        $this->k.= '</table>';
        return $this->k;
    }
    
    /**
     * Show bootsrap modal for deleting specified resource.
     *
     * @param  String $title
     * @param  String $body
     * @param  String $link
     * @return Request
     */
    public function BtDeleting($title, $body, $link) {
        $this->k = $this->BtDl($title, $body, $link);
        return $this->k;
    }
    
    /**
     * Show Ajaxis bootstrap form for creating the specified resource.
     *
     * @param  Array $input
     * @param  String $link
     * @return Request
     */
    public function BtCreateFormModal($input, $link) {
        $this->k = $this->BtHeadModal('Create');
        
        foreach ($input as $value) {
            $this->k.= $this->BtGenerateInput($value['key'], $value['name'], $value['value'], $value['type']);
        }
        $this->k.= $this->BtEndCreate($link, 'Create');
        return $this->k;
    }
    
    /**
     * Show Ajaxis bootstrap form for editing the specified resource.
     * @param  Array $input
     * @param  String $link
     * @return Request
     */
    public function BtEditFormModal($input, $link) {
        $this->k = $this->BtHeadModal('Edit');
        
        foreach ($input as $value) {
            $this->k.= $this->BtGenerateInput($value['key'], $value['name'], $value['value'], $value['type']);
        }
        $this->k.= $this->BtEndCreate($link, 'Update');
        return $this->k;
    }
    
    /**
     * Show bootstrap modal for displaying specified resource.
     * @param  Array $input
     * @return Request
     */
    public function BtDisplay($input) {
        $this->k = $this->BtHeadModal('Show');
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

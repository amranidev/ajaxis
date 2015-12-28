<?php
namespace Amranidev\Ajaxis;

use Amranidev\Ajaxis\AjaxisTools;
use Amranidev\Ajaxis\Bootstrap\Builders\BootstrapModalBuilder;
use Amranidev\Ajaxis\Materialize\Builders\MaterializeDeleteConfirmationMessage;
use Amranidev\Ajaxis\Materialize\Builders\MaterializeDisplayBuilder;
use Amranidev\Ajaxis\Materialize\Builders\MaterializeModalBuilder;
use Amranidev\Ajaxis\Materialize\MaterializeModalDirector;

class AjaxisGenerate extends AjaxisTools
{

    /**
     * the content request.
     *
     * @var String
     */
    protected $k;

    public function __construct()
    {
        $this->k = '';
    }

    /**
     * Show Ajaxis materialize form for editing the specified resource.
     *
     * @param  Array $input
     * @param  String $link
     * @return Request
     */
    public function MteditFormModal($input, $link)
    {
        $modalDirector = new MaterializeModalDirector();

        $modal = new MaterializeModalBuilder();

        $modalresult = $modalDirector->build('Edit', 'update', $input, $link, $modal);

        return $modalresult->modalHead . $modalresult->modalInput . $modalresult->modalFooter;
    }

    /**
     * Show Ajaxis materialize form for creating the specified resource.
     *
     * @param  Array $input
     * @param  String $link
     * @return Request
     */
    public function MtcreateFormModal($input, $link)
    {

        $modalDirector = new MaterializeModalDirector();

        $modal = new MaterializeModalBuilder();

        $modalresult = $modalDirector->build('Edit', 'update', $input, $link, $modal);

        return $modalresult->modalHead . $modalresult->modalInput . $modalresult->modalFooter;
    }

    /**
     * Show materialize confirmation message for deleting the specified resource.
     *
     * @param  String $title
     * @param  String $message
     * @param  String $link
     * @return Request
     */
    public function MtDeleting($title, $message, $link)
    {

        $modalDirector = new MaterializeModalDirector();

        $modal = new MaterializeDeleteConfirmationMessage();

        $modal = $modalDirector->build($title, 'Delete', $message, $link, $modal);

        return $modal->modalHead . $modal->modalInput . $modal->modalFooter;
    }

    /**
     * Show materialize modal for displaying specified resource.
     *
     * @param  Array $input
     * @return Request
     */
    public function MtDisplay($input)
    {
        $modalDirector = new MaterializeModalDirector();

        $modal = new MaterializeDisplayBuilder();

        $modal = $modalDirector->build(null, null, $input, null, $modal);

        return $modal->modalHead . $modal->modalInput . $modal->modalFooter;
    }

    /**
     * Show bootsrap modal for deleting specified resource.
     *
     * @param  String $title
     * @param  String $body
     * @param  String $link
     * @return Request
     */
    public function BtDeleting($title, $body, $link)
    {
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
    public function BtCreateFormModal($input, $link)
    {

        /*
        $this->k = $this->BtHeadModal('Create');

        foreach ($input as $value) {
        $this->k .= $this->BtGenerateInput($value['key'], $value['name'], $value['value'], $value['type']);
        }
        $this->k .= $this->BtEndModal($link, 'Create');
        return $this->k;*/

        $director = new MaterializeModalDirector();
        $modal = new BootstrapModalBuilder();
        $modal = $director->build('New', 'Create', $input, $link, $modal);

        return $modal->modalHead . $modal->modalInput . $modal->modalFooter;
    }

    /**
     * Show Ajaxis bootstrap form for editing the specified resource.
     * @param  Array $input
     * @param  String $link
     * @return Request
     */
    public function BtEditFormModal($input, $link)
    {
        $this->k = $this->BtHeadModal('Edit');

        foreach ($input as $value) {
            $this->k .= $this->BtGenerateInput($value['key'], $value['name'], $value['value'], $value['type']);
        }
        $this->k .= $this->BtEndModal($link, 'Update');
        return $this->k;
    }

    /**
     * Show bootstrap modal for displaying specified resource.
     * @param  Array $input
     * @return Request
     */
    public function BtDisplay($input)
    {
        $this->k = $this->BtHeadModal('Show');
        $this->k .= '<table class = "table table-bordered table-hover">';
        foreach ($input as $value) {
            $this->k .= '<tr><td><h3><b>' . $value['key'] . '</b></h3></td>';
            $this->k .= '<td><h4><i>' . $value['value'] . '</i></h4></td></tr>';
        }
        $this->k .= '</table>';
        $this->k .= $this->BtEndShow();
        return $this->k;
    }
}

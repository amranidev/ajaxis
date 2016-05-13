<?php

namespace Amranidev\Ajaxis;

use Amranidev\Ajaxis\Autoarray\AutoArray;
use Amranidev\Ajaxis\Bootstrap\Builders\BootstrapDeleteConfirmationMessage;
use Amranidev\Ajaxis\Bootstrap\Builders\BootstrapDisplayBuilder;
use Amranidev\Ajaxis\Bootstrap\Builders\BootstrapModalBuilder;
use Amranidev\Ajaxis\Bootstrap\Builders\BootstrapText;
use Amranidev\Ajaxis\Materialize\Builders\MaterializeDeleteConfirmationMessage;
use Amranidev\Ajaxis\Materialize\Builders\MaterializeDisplayBuilder;
use Amranidev\Ajaxis\Materialize\Builders\MaterializeModalBuilder;
use Amranidev\Ajaxis\Modal\ModalDirector;
use Illuminate\Database\Eloquent\Model;

/**
 * class AjaxisGenerate
 *
 * @package ajaxis
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class AjaxisGenerate
{
    /**
     * ModalDirector instance
     *
     * @var $modalDorector
     */
    private $modalDirector;

    /**
     * Materialize Modal Content
     *
     * @var MtModal
     */
    private $MtModal;

    /**
     * Bootstrap Modal Content
     *
     * @var $btModal;
     */
    private $BtModal;

    /**
     * create new AjaxisGenerate instrance
     */
    public function __construct()
    {
        $this->modalDirector = new ModalDirector();

        $this->MtModal = new MaterializeModalBuilder();

        $this->BtModal = new BootstrapModalBuilder();
    }

    /**
     * Show Ajaxis materialize form to edit specified resource.
     *
     * @param  Array $input
     * @param  String $link
     *
     * @return String
     */
    public function MteditFormModal($input, $link)
    {
        $modal = $this->modalDirector->build('Edit', 'update', $input, $link, $this->MtModal);

        return $modal->modalHead . $modal->modalBody . $modal->modalFooter;
    }

    /**
     * Show Ajaxis materialize form to create specified resource.
     *
     * @param  Array $input
     * @param  String $link
     *
     * @return String
     */
    public function MtcreateFormModal($input, $link)
    {
        $modal = $this->modalDirector->build('New', 'create', $input, $link, $this->MtModal);

        return $modal->modalHead . $modal->modalBody . $modal->modalFooter;
    }

    /**
     * Show materialize confirmation message to delete  specified resource.
     *
     * @param  String $title
     * @param  String $message
     * @param  String $link
     *
     * @return String
     */
    public function MtDeleting($title, $message, $link)
    {
        $modal = new MaterializeDeleteConfirmationMessage();

        $modal = $this->modalDirector->build($title, 'Delete', $message, $link, $modal);

        return $modal->modalHead . $modal->modalBody . $modal->modalFooter;
    }

    /**
     * Show materialize modal to displa specified resource.
     *
     * @param  Array $input
     *
     * @return String
     */
    public function MtDisplay($input)
    {
        $modal = new MaterializeDisplayBuilder();

        $modal = $this->modalDirector->build(null, null, $input, null, $modal);

        return $modal->modalHead . $modal->modalBody . $modal->modalFooter;
    }

    /**
     * Show bootsrap modal to delete specified resource.
     *
     * @param  String $title
     * @param  String $body
     * @param  String $link
     *
     * @return String
     */
    public function BtDeleting($title, $body, $link)
    {
        $modal = new BootstrapDeleteConfirmationMessage();

        $modal = $this->modalDirector->build($title, 'Agree', $body, $link, $modal);

        return $modal->modalHead . $modal->modalBody . $modal->modalFooter;
    }

    /**
     * Show Ajaxis bootstrap form to create specified resource.
     *
     * @param  Array $input
     * @param  String $link
     * 
     * @return String
     */
    public function BtCreateFormModal($input, $link)
    {
        $modal = $this->modalDirector->build('New', 'Create', $input, $link, $this->BtModal);

        return $modal->modalHead . $modal->modalBody . $modal->modalFooter;
    }

    /**
     * Show Ajaxis bootstrap form to edite specified resource.
     *
     * @param  Array $input
     * @param  String $link
     * 
     * @return String
     */
    public function BtEditFormModal($input, $link)
    {
        $modal = $this->modalDirector->build('Edit', 'update', $input, $link, $this->BtModal);

        return $modal->modalHead . $modal->modalBody . $modal->modalFooter;
    }

    /**
     * Show bootstrap modal to display specified resource.
     *
     * @param  Array $input
     * 
     * @return String
     */
    public function BtDisplay($input)
    {
        $modal = new BootstrapDisplayBuilder();

        $modal = $this->modalDirector->build('Dsiplay', 'ok', $input, null, $modal);

        return $modal->modalHead . $modal->modalBody . $modal->modalFooter;
    }

    /**
     * build Materialize modal quickly by a table name
     *
     * @param String $table
     * @param String $link
     *
     * @return String
     */
    public function MtGet($table, $link)
    {
        $result = new AutoArray($table);

        $modal = $this->modalDirector->build('New', 'Create', $result->merge(), $link, $this->MtModal);

        return $modal->modalHead . $modal->modalBody . $modal->modalFooter;
    }

    /**
     * build modal quickly by Eloquent model
     *
     * @var Model $model
     * @var String $link
     *
     *  @return String
     */
    public function MteditText(Model $model, $link)
    {
        $result = new AutoArray('');

        $modal = $this->modalDirector->build('Edit', 'Update', $result->getModelArray($model), $link, $this->MtModal);

        return $modal->modalHead . $modal->modalBody . $modal->modalFooter;
    }

    /**
     * build Bootstrap modal quickly by a table name
     *
     * @param String $table
     * @param String $link
     *
     * @return String
     */
    public function BtGet($table, $link)
    {
        $result = new AutoArray($table);

        $modal = $this->modalDirector->build('New', 'Create', $result->merge(), $link, $this->BtModal);

        return $modal->modalHead . $modal->modalBody . $modal->modalFooter;
    }

    /**
     * build modal quickly by Eloquent model
     *
     * @param Model $model
     * @param String $link
     *
     * @return String
     */
    public function BteditText(Model $model, $link)
    {
        $result = new AutoArray('');

        $modal = $this->modalDirector->build('Edit', 'Update', $result->getModelArray($model), $link, $this->BtModal);

        return $modal->modalHead . $modal->modalBody . $modal->modalFooter;
    }

    /**
     * build simple modal with text
     * 
     * @param String $input
     * @param String $link
     * 
     * @return String 
     */
        public function BtText($input, $link)
        {
            $director = new ModalDirector();

            $modal = new BootstrapText();

            $modal = $director->build('Has Role', 'Ok', $input, $link, $modal);

            return $modal->modalHead . $modal->modalBody . $modal->modalFooter;
        }
}

<?php

namespace Amranidev\Ajaxis;

use Amranidev\Ajaxis\Autoarray\MtAutoArray;
use Amranidev\Ajaxis\Bootstrap\Builders\BootstrapDeleteConfirmationMessage;
use Amranidev\Ajaxis\Bootstrap\Builders\BootstrapDisplayBuilder;
use Amranidev\Ajaxis\Bootstrap\Builders\BootstrapModalBuilder;
use Amranidev\Ajaxis\Materialize\Builders\MaterializeDeleteConfirmationMessage;
use Amranidev\Ajaxis\Materialize\Builders\MaterializeDisplayBuilder;
use Amranidev\Ajaxis\Materialize\Builders\MaterializeModalBuilder;
use Amranidev\Ajaxis\Modal\ModalDirector;

/**
 * class AjaxisGenerate
 *
 * @package ajaxis
 * @author Amrani Houssain <amranidev@gmail.com>
 *
 * @todo Test Mget
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
     * create new AjaxisGenerate instrance
     */
    public function __construct()
    {
        $this->modalDirector = new ModalDirector();
    }

    /**
     * Show Ajaxis materialize form to edit specified resource.
     *
     * @param  Array $input
     * @param  String $link
     * @return String
     */
    public function MteditFormModal($input, $link)
    {

        $modal = new MaterializeModalBuilder();

        $modalresult = $this->modalDirector->build('Edit', 'update', $input, $link, $modal);

        return $modalresult->modalHead . $modalresult->modalBody . $modalresult->modalFooter;
    }

    /**
     * Show Ajaxis materialize form to create specified resource.
     *
     * @param  Array $input
     * @param  String $link
     * @return String
     */
    public function MtcreateFormModal($input, $link)
    {
        $modal = new MaterializeModalBuilder();

        $modalresult = $this->modalDirector->build('New', 'create', $input, $link, $modal);

        return $modalresult->modalHead . $modalresult->modalBody . $modalresult->modalFooter;
    }

    /**
     * Show materialize confirmation message to delete  specified resource.
     *
     * @param  String $title
     * @param  String $message
     * @param  String $link
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
     * @return Request
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
     * @return String
     */
    public function BtCreateFormModal($input, $link)
    {
        $modal = new BootstrapModalBuilder();

        $modal = $this->modalDirector->build('New', 'Create', $input, $link, $modal);

        return $modal->modalHead . $modal->modalBody . $modal->modalFooter;
    }

    /**
     * Show Ajaxis bootstrap form to edite specified resource.
     * @param  Array $input
     * @param  String $link
     * @return String
     */
    public function BtEditFormModal($input, $link)
    {
        $modal = new BootstrapModalBuilder();

        $modal = $this->modalDirector->build('Edit', 'update', $input, $link, $modal);

        return $modal->modalHead . $modal->modalBody . $modal->modalFooter;
    }

    /**
     * Show bootstrap modal to display specified resource.
     * @param  Array $input
     * @return String
     */
    public function BtDisplay($input)
    {
        $modal = new BootstrapDisplayBuilder();

        $modal = $this->modalDirector->build('Dsiplay', 'ok', $input, null, $modal);

        return $modal->modalHead . $modal->modalBody . $modal->modalFooter;
    }

    /**
     * Test v3.0.x-dev
     */
    public function MtGet($input, $link)
    {
        $Mtquick = new MtAutoArray($input);

        $modal = new MaterializeModalBuilder();

        $modal = $this->modalDirector->build('New', 'Create', $Mtquick->merge(), $link, $modal);

        return $modal->modalHead . $modal->modalBody . $modal->modalFooter;
    }
}

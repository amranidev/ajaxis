<?php

namespace Amranidev\Ajaxis;

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
 */
class AjaxisGenerate
{
    /**
     * Show Ajaxis materialize form to edit specified resource.
     *
     * @param  Array $input
     * @param  String $link
     * @return String
     */
    public function MteditFormModal($input, $link)
    {
        $modalDirector = new ModalDirector();

        $modal = new MaterializeModalBuilder();

        $modalresult = $modalDirector->build('Edit', 'update', $input, $link, $modal);

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
        $modalDirector = new ModalDirector();

        $modal = new MaterializeModalBuilder();

        $modalresult = $modalDirector->build('New', 'create', $input, $link, $modal);

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
        $modalDirector = new ModalDirector();

        $modal = new MaterializeDeleteConfirmationMessage();

        $modal = $modalDirector->build($title, 'Delete', $message, $link, $modal);

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
        $modalDirector = new ModalDirector();

        $modal = new MaterializeDisplayBuilder();

        $modal = $modalDirector->build(null, null, $input, null, $modal);

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
        $director = new ModalDirector();

        $modal = new BootstrapDeleteConfirmationMessage();

        $modal = $director->build($title, 'Agree', $body, $link, $modal);

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
        $director = new ModalDirector();

        $modal = new BootstrapModalBuilder();

        $modal = $director->build('New', 'Create', $input, $link, $modal);

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
        $director = new ModalDirector();

        $modal = new BootstrapModalBuilder();

        $modal = $director->build('Edit', 'update', $input, $link, $modal);

        return $modal->modalHead . $modal->modalBody . $modal->modalFooter;
    }

    /**
     * Show bootstrap modal to display specified resource.
     * @param  Array $input
     * @return String
     */
    public function BtDisplay($input)
    {
        $director = new ModalDirector();

        $modal = new BootstrapDisplayBuilder();

        $modal = $director->build('Dsiplay', 'ok', $input, null, $modal);

        return $modal->modalHead . $modal->modalBody . $modal->modalFooter;
    }
}

<?php

namespace Amranidev\Ajaxis\Materialize\Builders;

use Amranidev\Ajaxis\Modal\Modal;
use Amranidev\Ajaxis\Modal\ModalInterface;

class MaterializeDeleteConfirmationMessage implements ModalInterface
{
    public $Modal;

    public function __construct()
    {
        $this->Modal = new Modal();
    }

    public function buildHead($title)
    {
        $this->Modal->modalHead = view('Ajaxis::materialize.get.head', compact('title'))->render();
    }

    public function buildBody($a, $b, $c, $input)
    {
        $this->Modal->modalBody .= $input;
    }

    public function buildfooter($link, $action)
    {
        $this->Modal->modalFooter = view('Ajaxis::materialize.get.footer', compact('link', 'action'))->render();
    }

    public function getResult()
    {
        return $this->Modal;
    }
}

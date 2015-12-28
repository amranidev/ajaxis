<?php

namespace Amranidev\Ajaxis\Bootstrap\Builders;

use Amranidev\Ajaxis\Modal\Modal;
use Amranidev\Ajaxis\Modal\ModalInterface;

class BootstrapDeleteConfirmationMessage implements ModalInterface
{
    private $Modal;

    public function __construct()
    {
        $this->Modal = new Modal();
    }

    public function buildHead($title)
    {
        $this->Modal->modalHead = view('Ajaxis::bootstrap.get.head', compact('title'))->render();
    }

    public function buildBody($a, $b, $c, $d)
    {
        $this->Modal->modalInput .= $input;
    }
    public function buildFooter($link, $action)
    {
        $this->Modal->modalFooter = view('Ajaxis::bootstrap.get.footer', compact('link', 'action'))->render();

    }
    public function getResult()
    {
        return $this->Modal;
    }

}

<?php

namespace Amranidev\Ajaxis\Bootstrap\Builders;

use Amranidev\Ajaxis\Modal\Modal;
use Amranidev\Ajaxis\Modal\ModalInterface;

class BootstrapDisplayBuilder implements ModalInterface
{
    private $Modal;

    public function __construct()
    {
        $this->Modal = new Modal();
    }

    public function buildHead($title)
    {
        $this->Modal->modalHead = '';

    }

    public function buildBody($a, $b, $c, $type)
    {
        $this->Modal->modalInput .= view('Ajaxis::bootstrap.display.body', compact('input'))->render();

    }

    public function buildFooter($link, $action)
    {
        $this->Modal->modalFooter = '';
    }

    public function getResult()
    {
        return $this->Modal;
    }

}

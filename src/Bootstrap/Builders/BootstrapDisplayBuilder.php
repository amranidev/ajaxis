<?php

namespace Amranidev\Ajaxis\Bootstrap\Builders;

use Amranidev\Ajaxis\Modal\Modal;
use Amranidev\Ajaxis\Modal\ModalInterface;

class BootstrapDisplayBuilder implements ModalInterface
{
    public $Modal;

    public function __construct()
    {
        $this->Modal = new Modal();
    }

    public function buildHead($title)
    {
        $this->Modal->modalHead = view('Ajaxis::bootstrap.get.head', compact('title'));
    }

    public function buildBody($a, $b, $c, $input)
    {
        $this->Modal->modalBody .= view('Ajaxis::bootstrap.display.body', compact('input'))->render();

    }

    public function buildFooter($link, $action)
    {
        $this->Modal->modalFooter = '</div></div></div></div>';
    }

    public function getResult()
    {
        return $this->Modal;
    }

}

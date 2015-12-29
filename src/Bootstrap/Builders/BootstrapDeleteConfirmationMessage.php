<?php

namespace Amranidev\Ajaxis\Bootstrap\Builders;

/**
 * page de garde
 *
 *
 */
use Amranidev\Ajaxis\Modal\Modal;
use Amranidev\Ajaxis\Modal\ModalInterface;

class BootstrapDeleteConfirmationMessage implements ModalInterface
{
    public $Modal;

    public function __construct()
    {
        $this->Modal = new Modal();
    }

    public function buildHead($title)
    {
        $this->Modal->modalHead = view('Ajaxis::bootstrap.get.head', compact('title'))->render();
    }

    public function buildBody($a, $b, $c, $input)
    {
        $this->Modal->modalBody .= '<div class="modal-body">' . $input . '</div>';
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

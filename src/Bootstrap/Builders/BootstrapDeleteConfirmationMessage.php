<?php

namespace Amranidev\Ajaxis\Bootstrap\Builders;

use Amranidev\Ajaxis\Modal\Modal;
use Amranidev\Ajaxis\Modal\ModalInterface;

/**
 * class BootstrapDeleteConfirmationMessage
 *
 * @package ajaxis/Bootstrap/Builders
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class BootstrapDeleteConfirmationMessage implements ModalInterface
{
    /**
     * modal instance
     *
     * @var $Modal
     */
    public $Modal;

    /**
     * create new BootstrapDeleteConfitmationMessage instance
     */
    public function __construct()
    {
        $this->Modal = new Modal();
    }

    /**
     * Build modal head
     *
     * @param $title String
     */
    public function buildHead($title)
    {
        $this->Modal->modalHead = view('Ajaxis::bootstrap.get.head', compact('title'))->render();
    }

    /**
     * Build modal body
     *
     * @param $input Array
     */
    public function buildBody($a, $b, $c, $input)
    {
        $this->Modal->modalBody .= '<div class="modal-body">' . $input . '</div>';
    }

    /**
     * Build modal footer
     *
     * @param $link String
     * @param $action String
     */
    public function buildFooter($link, $action)
    {
        $this->Modal->modalFooter = view('Ajaxis::bootstrap.get.footer', compact('link', 'action'))->render();

    }

    /**
     * Get Modal instance
     *
     * @return Modal
     */
    public function getResult()
    {
        return $this->Modal;
    }

}

<?php

namespace Amranidev\Ajaxis\Materialize\Builders;

use Amranidev\Ajaxis\Modal\Modal;
use Amranidev\Ajaxis\Modal\ModalInterface;

/**
 * class MaterializeDeleteConfirmationMessage.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class MaterializeDeleteConfirmationMessage implements ModalInterface
{
    /**
     * Modal Instance.
     *
     * @var
     */
    public $Modal;

    /**
     * Create new MaterializeDeleteConfirmationMessage.
     */
    public function __construct()
    {
        $this->Modal = new Modal();
    }

    /**
     * Build modal head.
     *
     * @param $title String
     */
    public function buildHead($title, $link)
    {
        $this->Modal->modalHead = view('Ajaxis::materialize.get.head', compact('title'))->render();
    }

    /**
     * Build modal body.
     *
     * @param $input Array
     */
    public function buildBody($a, $b, $c, $input)
    {
        $this->Modal->modalBody .= $input;
    }

/**
 * Build modal footer.
 *
 * @param $link String
 * @param $action String
 */
public function buildfooter($link, $action)
{
    $this->Modal->modalFooter = view('Ajaxis::materialize.get.footer', compact('link', 'action'))->render();
}

    /**
     * Get Modal instance.
     *
     * @return Modal
     */
    public function getResult()
    {
        return $this->Modal;
    }
}

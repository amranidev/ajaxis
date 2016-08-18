<?php

namespace Amranidev\Ajaxis\Materialize\Builders;

use Amranidev\Ajaxis\Modal\Modal;
use Amranidev\Ajaxis\Modal\ModalInterface;

/**
 * class MAterializeDisplayBuilder.
 *
 * @author  Amrani Houssain <amranidev@gmail.com>
 */
class MaterializeDisplayBuilder implements ModalInterface
{
    /**
     * Modal Instance.
     *
     * @var
     */
    public $Modal;

    /**
     * Create new MaterializeDisplayBuilder instance.
     */
    public function __construct()
    {
        $this->Modal = new Modal();
    }

    /**
     * Build modal head.
     *
     * @param string $title
     */
    public function buildHead($title, $link)
    {
        $this->Modal->modalHead = '';
    }

    /**
     * Build modal body.
     *
     * @param array $input
     */
    public function buildBody($a, $b, $c, $input)
    {
        $this->Modal->modalBody .= view('Ajaxis::materialize.display.body', compact('input'))->render();
    }

    /**
     * Build modal footer.
     *
     * @param string $link
     * @param string $action
     */
    public function buildFooter($link, $action)
    {
        $this->Modal->modalFooter = '';
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

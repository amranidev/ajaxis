<?php

namespace Amranidev\Ajaxis\Materialize\Builders;

use Amranidev\Ajaxis\Modal\Modal;
use Amranidev\Ajaxis\Modal\ModalInterface;

/**
 * class MaterializeModalBuilder
 *
 * @package ajaxis/Materialize/Builders
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class MaterializeModalBuilder implements ModalInterface
{
    /**
     * Modal Instance
     *
     * @var $Modal
     */
    public $Modal;

    /**
     * Create new MaterializeModalBuilder instance
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
        $this->Modal->modalHead = view('Ajaxis::materialize.head', compact('title'))->render();
    }

    /**
     * Build modal body
     *
     * @param $lable String
     * @param $name String
     * @param $value String
     * @param $type String
     */
    public function buildBody($label, $name, $value, $type)
    {
        switch ($type) {
            case 'text':
                $this->Modal->modalBody .=
                view('Ajaxis::materialize.types.text', compact('label', 'name', 'value', 'type'))->render();
                break;

            case 'date':
                $this->Modal->modalBody .=
                view('Ajaxis::materialize.types.date', compact('name', 'value', 'label'))->render();
                break;

            case 'select':
                $this->Modal->modalBody .=
                view('Ajaxis::materialize.types.select', compact('value', 'name'))->render();
                break;

            case 'checkbox':
                $this->Modal->modalBody .=
                view('Ajaxis::materialize.types.checkbox', compact('value', 'type', 'name', 'label'))->render();
                break;

            case 'radio':
                $this->Modal->modalBody .=
                view('Ajaxis::materialize.types.radio', compact('type', 'name', 'label'))->render();
                break;

            case 'hidden':
                $this->Modal->modalBody .=
                view('Ajaxis::materialize.types.text', compact('label', 'name', 'value', 'type'))->render();
                break;

            case 'password':
                $this->Modal->modalBody .=
                view('Ajaxis::materialize.types.text', compact('label', 'name', 'value', 'type'))->render();
                break;

            default:
                throw new \Exception('Type not found ' . $type);
        }
    }

    /**
     * Build modal footer
     *
     * @param $link String
     * @param $action String
     */
    public function buildFooter($link, $action)
    {
        $this->Modal->modalFooter = view('Ajaxis::materialize.footer', compact('link', 'action'))->render();
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

<?php

namespace Amranidev\Ajaxis\Materialize\Builders;

use Amranidev\Ajaxis\Modal\Modal;
use Amranidev\Ajaxis\Modal\ModalInterface;

class MaterializeModalBuilder implements ModalInterface
{
    public $Modal;

    public function __construct()
    {
        $this->Modal = new Modal();
    }

    public function buildHead($title)
    {
        $this->Modal->modalHead = view('Ajaxis::materialize.head', compact('title'))->render();
    }

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

            default:
                throw new \Exception('Type not found ' . $type);
        }
    }

    public function buildFooter($link, $action)
    {
        $this->Modal->modalFooter = view('Ajaxis::materialize.footer', compact('link', 'action'))->render();
    }

    public function getResult()
    {
        return $this->Modal;
    }

}

<?php

namespace Amranidev\Ajaxis\Bootstrap\Builders;

use Amranidev\Ajaxis\Modal\Modal;
use Amranidev\Ajaxis\Modal\ModalInterface;

class BootstrapModalBuilder implements ModalInterface
{
    public $Modal;

    public function __construct()
    {
        $this->Modal = new Modal();
    }

    public function buildHead($title)
    {
        $this->Modal->modalHead = view('Ajaxis::bootstrap.head', compact('title'))->render();
    }

    public function buildBody($label, $name, $value, $type)
    {
        switch ($type) {
            case 'text':
                $this->Modal->modalBody .= view('Ajaxis::bootstrap.types.text',
                    compact('label', 'name', 'value', 'type'))->render();
                break;

            case 'date':
                $this->Modal->modalBody .=
                view('Ajaxis::bootstrap.types.text', compact('name', 'value', 'label', 'type'))->render();
                break;

            case 'select':
                $this->Modal->modalBody .=
                view('Ajaxis::bootstrap.types.select', compact('value', 'label', 'name'))->render();
                break;

            case 'radio':
                $this->Modal->modalBody .=
                view('Ajaxis::bootstrap.types.radio', compact('name', 'value', 'label'))->render();
                break;

            case 'checkbox':
                $this->Modal->modalBody .=
                view('Ajaxis::bootstrap.types.checkbox', compact('name', 'value', 'label'))->render();
                break;

            default:
                throw new \Exception('Type not found' . $type);
        }
    }

    public function buildFooter($link, $action)
    {
        $this->Modal->modalFooter = view('Ajaxis::bootstrap.footer', compact('link', 'action'))->render();
    }

    public function getResult()
    {
        return $this->Modal;
    }

}

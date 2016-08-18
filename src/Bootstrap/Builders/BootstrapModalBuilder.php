<?php

namespace Amranidev\Ajaxis\Bootstrap\Builders;

use Amranidev\Ajaxis\Modal\Modal;
use Amranidev\Ajaxis\Modal\ModalInterface;

/**
 * class BootsrtapModalBuilder.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class BootstrapModalBuilder implements ModalInterface
{
    /**
     * Modal Instance.
     *
     * @var
     */
    public $Modal;

    /**
     * Create new BootstrapModalBuilder instance.
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
        $this->Modal->modalHead = view('Ajaxis::bootstrap.head', compact('title'))->render();
    }

    /**
     * Build modal body.
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

            case 'hidden':
                $this->Modal->modalBody .=
                view('Ajaxis::bootstrap.types.text', compact('label', 'name', 'value', 'type'))->render();
                break;

            case 'password':
                $this->Modal->modalBody .=
                view('Ajaxis::bootstrap.types.text', compact('label', 'name', 'value', 'type'))->render();
                break;
            case 'file':
                $this->Modal->modalBody .=
                view('Ajaxis::bootstrap.types.text', compact('label', 'name', 'value', 'type'))->render();
                break;
            default:
                throw new \Exception('Type not found'.$type);
        }
    }

    /**
     * Build modal footer.
     *
     * @param $link String
     * @param $action String
     */
    public function buildFooter($link, $action)
    {
        $this->Modal->modalFooter = view('Ajaxis::bootstrap.footer', compact('link', 'action'))->render();
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

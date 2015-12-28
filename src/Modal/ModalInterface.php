<?php

namespace Amranidev\Ajaxis\Modal;

interface ModalInterface
{
    public function buildHead($title);
    public function buildBody($label, $name, $value, $type);
    public function buildFooter($link, $action);
    public function getResult();
}

<?php

namespace Amranidev\Ajaxis\Modal;

/**
 * interface ModalInterface.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
interface ModalInterface
{
    /**
     * build head of a modal.
     *
     * @param $title String
     */
    public function buildHead($title, $link);

    /**
     * build body of a modal.
     *
     * @param $label String
     * @param $name String
     * @param $value String
     * @param $type String
     */
    public function buildBody($label, $name, $value, $type);

    /**
     * build footer of a modal.
     *
     * @param $link String
     * @param $action String
     */
    public function buildFooter($link, $action);

    /**
     * get modal.
     *
     * @return Modal
     */
    public function getResult();
}

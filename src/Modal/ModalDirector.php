<?php

namespace Amranidev\Ajaxis\Modal;

use Amranidev\Ajaxis\Modal\ModalInterface;

/**
 * class ModalDirector
 *
 * @package ajaxis\Modal
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class ModalDirector
{

    /**
     * build modal
     *
     * @param $title String
     * @param $action String
     * @param $input Array/String
     * @param $link String
     * @param $modal Modal
     *
     * $input may be a string or an array.
     */
    public function build($title, $action, $input, $link, ModalInterface $modal)
    {
        /**
         * build modal head
         */
        $modal->buildHead($title);

        /**
         * check if $input is an array
         */
        if (is_array($input)) {

            /**
             * check if name key exists
             */
            if (array_key_exists('name', $input[1])) {
                foreach ($input as $val) {
                    $modal->buildBody($val['key'], $val['name'], $val['value'], $val['type']);
                }
            } else {
                $modal->buildBody(null, null, null, $input);
            }
        } else {
            $modal->buildBody(null, null, null, $input);
        }

        /**
         * build modal footer
         */
        $modal->buildFooter($link, $action);

        /**
         * get modal building
         */
        return $modal->getResult();
    }
}

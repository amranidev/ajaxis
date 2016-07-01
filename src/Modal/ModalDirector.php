<?php

namespace Amranidev\Ajaxis\Modal;

/**
 * class ModalDirector.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class ModalDirector
{
    /**
     * build modal.
     *
     * @param string $title
     * @param string $action
     * @param mixed  $input
     * @param string $link
     * @param Modal  $modal
     *
     * $input may be a string or an array.
     */
    public function build($title, $action, $input, $link, ModalInterface $modal)
    {
        /*
         * build modal head
         */
        $modal->buildHead($title, $link);

        /**
         * check if $input is an array.
         */
        if (is_array($input)) {

            /*
             * check if name key exists
             */
            if (array_key_exists('name', $input[0])) {
                foreach ($input as $val) {
                    $modal->buildBody($val['key'], $val['name'], $val['value'], $val['type']);
                }
            } else {
                $modal->buildBody(null, null, null, $input);
            }
        } else {
            $modal->buildBody(null, null, null, $input);
        }

        /*
         * build modal footer
         */
        $modal->buildFooter($link, $action);

        /*
         * get modal building
         */
        return $modal->getResult();
    }
}

<?php

namespace Amranidev\Ajaxis\Modal;

use Amranidev\Ajaxis\Modal\ModalInterface;

class ModalDirector
{

    public function build($title, $action, $input, $link, ModalInterface $modal)
    {

        $modal->buildHead($title);

        if (is_array($input)) {
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

        $modal->buildFooter($link, $action);

        return $modal->getResult();
    }
}

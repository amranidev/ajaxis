<?php

namespace Amranidev\Ajaxis\Autoarray;

use Amranidev\Ajaxis\Attributes\Attributes;

/**
 * class MtAutoArray
 *
 * @package ajaxis\quick
 * @author Amrani Houssain <amranidev@gmail.com>
 *
 * @todo Test
 */
class MtAutoArray
{

    public $result = [];

    private $attributes;

    public function __construct($table)
    {
        $this->attributes = new Attributes($table);
    }

    private function arrayAnalyzer($input)
    {
        $result = [];

        foreach ($input as $key => $value) {
            if ($key == "Field") {
                $result[] = $value;
            } elseif ($key == "Type") {
                if (str_contains($value, 'int')) {
                    $result[] = "text";
                } elseif (str_contains($value, 'char')) {
                    $result[] = 'text';
                } elseif ($value = 'date') {
                    $result[] = 'date';
                }
            }
        }

        return $result;
    }

    private function getResult()
    {
        $result = [];

        foreach ($this->attributes->getAttributes() as $key) {
            $result[] = $this->arrayAnalyzer($key);
        }

        return $result;
    }

    public function merge()
    {
        $array = $this->getResult();

        foreach ($array as $key => $value) {
            $value['name'] = $value['0'];
            $value['type'] = $value['1'];
            $value['key'] = $value['0'] . ' :';
            $value['value'] = '';
            unset($value['1']);
            unset($value['0']);
            $this->result[] = $value;
        }

        return $this->result;
    }

}

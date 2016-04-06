<?php

use Amranidev\Ajaxis\Ajaxis;

class AjaxisTest extends TestCase
{

    public function __construct()
    {
        parent::setUp();
    }
    /*
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $ajaxis = Ajaxis::BtCreateFormModal([
            ['type' => 'text', 'name' => 'name1', 'key' => 'name1', 'value' => ''],
        ], "api");

        $this->assertInternalType("string", $ajaxis);
    }
}

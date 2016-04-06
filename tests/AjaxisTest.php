<?php

use Amranidev\Ajaxis\AjaxisGenerate;
use Amranidev\Ajaxis\Tests\TestCase;

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
        $ajaxis = new AjaxisGenerate();

        $ajaxis = $ajaxis->BtCreateFormModal([
            ['type' => 'Text', 'name' => 'firstname', 'key' => 'Firstname : ', 'value' => ''],
        ], "Api");

        $this->assertInternalType("string", $ajaxis);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: designstudio_12
 * Date: 17/04/2014
 * Time: 14:54
 */

namespace tests\controllers;
include('../../apps/controllers/MainController.php'); /*connects to what we are going to test*/

class MainControllerTest extends \PHPUnit_Framework_TestCase {
    function testPageSet(){
        /* this function will test if the page is set. we make the test first and then write the class afterwards to pass the test (MainController.php is the class file).*/
        $data = new \apps\controllers\MainController();
        $this->assertNotEmpty($data->page,$message="The page property has not been set"); /*in this instance, we are going to assert (check) to see if something is not empty*/

    }
    function testPageEquals(){
        $data = new \apps\controllers\MainController();
        $this->assertEquals($data->page,'about',$message="The page property has not been set to about");
    }
}
 
<?php
namespace app\tests\unit;

use app\models\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
    }

    protected function tearDown()
    {
    }

    /*
     * test create user
     */
    public function testCreate()
    {
        $model = new User();
        assertFalse($model->save(),"user canot be saved, no fields");
    }
    /*
     * test update user
     */
    public function testUpdate(){
        
    }
    
    /*
     * test delete user
     */
    public function testDelete(){
        
    }
    
}
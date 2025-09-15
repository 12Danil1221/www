<?php 
require_once __DIR__.('/../classes/MyClass.php');

use PHPUnit\Framework\TestCase;
final class MyClassTest extends TestCase
{

    public function test_tellName()
    {
        $obj_user2 = new MyClass(12,'Test');
        $this->assertSame('Test', $obj_user2->name);
        $this->assertSame(12, $obj_user2->age);

        $result = $obj_user2->tellName($obj_user2->name);
        $this->assertEquals("Name: Test", $result);
    }
}



?>
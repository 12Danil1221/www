<?php 
class MyClass
{
    public $age;
    public $name;

    public function __construct(int $age, string $name)
    {
        $this->age = $age;
        $this->name = $name;
    }
        public function tellName($name)
    {
        return "Name: $name";
    }
    public function __autoload($class_name)
    {
        include 'classes/'.$class_name.'.php';
        
        echo "Wont load $class_name.php file";
        throw new Exception("Unable to load $class_name.php file");
    }

}
try{


}catch(Exception $e){
    echo "Error: ".$e->getMessage()."\n";
}


?>
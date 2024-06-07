<?php 
namespace core\tools;
use ReflectionClass;
use ReflectionProperty;

class ObjectManager
{
    
    static function  objectToArray($obj) {
        $arr = [];
        $reflectionClass = new ReflectionClass($obj);
        $properties = $reflectionClass->getProperties(ReflectionProperty::IS_PRIVATE);
        foreach ($properties as $property) {
            $propertyName = $property->getName();
            $methodName = 'get' . ucfirst($propertyName);
            if (method_exists($obj, $methodName)) {
                $arr[$propertyName] = $obj->$methodName();
            }
        }
        return $arr;
    }
}


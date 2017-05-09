<?php
namespace QuickBooksOnline\API\Facades;

class Customer{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating Customer is Empty");
        $AccountObject = FacadeHelper::reflectArrayToObject("Customer", $data, $throwException );
        return $AccountObject;
    }

    /**
     * This is an immutable function
     */
    public static function update($objToUpdate, array $data){
        $classOfObj = get_class($objToUpdate);
        if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("Customer")) != 0){
            throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instace of Customer.");
        }
        $newCustomerObj = Customer::create($data);
        $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
        FacadeHelper::mergeObj($clonedOfObj, $newCustomerObj);
        return $clonedOfObj;
    }

}

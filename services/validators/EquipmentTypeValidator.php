<?php namespace App\Services\Validators;
 
class EquipmentTypeValidator extends ContextValidator {
 
  /**
   * Validation rules
   */
  public static $rules = array(
    'create'          => array('name' => 'required|min:3|unique:equipment_types,name',),

    'update'          => array('name' => 'required|min:3|unique:equipment_types,name,:current',),

    );
 
}
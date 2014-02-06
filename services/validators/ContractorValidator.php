<?php namespace App\Services\Validators;
 
class ContractorValidator extends ContextValidator {
 
  /**
   * Validation rules
   */
  public static $rules = array(
    'create'          => array('name' => 'required|min:3|unique:contractors,name',
    						   'ruc' =>  'sometimes|unique:contractors,ruc',),

    'update'          => array('name' => 'required|min:3|unique:contractors,name,:current',
    						   'ruc' =>  'sometimes|unique:contractors,ruc,:current',),

    );


 
}
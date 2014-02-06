<?php namespace App\Services\Validators;
 
class ConfigurationValidator extends ContextValidator {
 
  /**
   * Validation rules
   */
  public static $rules = array(
    'create'          => array('bonds_institution' => 'required|min:3',
                						   'days_alert_contrats' => 'required|integer|min:3',
                						   'days_alert_dep_guarantees' => 'required|integer|min:3',
                						   'days_alert_bonds' => 'required|integer|min:3',
    						   ),

    );
 
}
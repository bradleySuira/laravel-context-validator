<?php namespace App\Services\Validators;
 
class CustomerValidator extends ContextValidator {
 
  /**
   * Validation rules
   */
  public static $rules = array(
    'create'          => array('name' => 'required|min:3',
                  					   'ruc' => 'required|min:5|unique:customers,ruc',
                               'phone' => 'required|min:7',
                  					   'legal_rep' => 'required|min:6',
                               'email_legal_rep' => 'email',
                               'contact_email' => 'email',),

    'update'          => array('name' => 'required|min:3',
                               'phone' => 'required|min:7',
                               'legal_rep' => 'required|min:6',
                               'email_legal_rep' => 'email',
                               'contact_email' => 'email',),

    );
 
}
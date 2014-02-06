<?php namespace App\Services\Validators;

use \App\Services\Validators\Exceptions\NotExistValidatorRuleException;

abstract class ContextValidator
{
	protected $input;
	protected static $rules = array();
	protected $errors;
    protected $event;
    protected $currentId;
    
    public function __construct($input = null)
    {
        $this->input = $input ?: \Input::all();
    }

    /**
     * set the input to validate
     * 
     * @param array $input
     * @return App\Services\Validators\ContextValidator *on the extended class inscance
     */
    public static function make($input = null)
    {
        return new static($input);
    }

    /**
     * Set the input to validate
     * 
     * @param array $input
     * @return App\Services\Validators\ContextValidator *on the extended class inscance
     */
    public function on($event)
    {
    	$event = strtolower($event);
    	if(!array_key_exists($event, static::$rules )) {
    		throw new NotExistValidatorRuleException("The rule $event not exist");
    	}
        $this->event = $event;
        return $this;
    }

    /**
     * Set the current Id for for replace in validation rul in string :current
     * 
     * @param integer $id
     * @return App\Services\Validators\ContextValidator *on the extended class inscance
     */
    public function setCurrent($id)
    {
        $this->currentId = $id;
        return $this;
    }

    /**
     * Process the validation
     * 
     * @return bool
     */
    public function passes()
    {

        //for updates and unique validation, ignore the current id or other use
        //first you must set the currentId
        if($this->currentId > 0) {
           foreach (static::$rules[$this->event] as $key => $value) {
              static::$rules[$this->event][$key] = str_replace(':current', $this->currentId, static::$rules[$this->event][$key]); 
           }
        }

        $v = \Validator::make($this->input, static::$rules[$this->event]);
                if($v->passes()) {
                    return true;
                }
                $this->errors = $v->messages();
                return false;
    }


    /**
     * Get errors if exist
     * 
     * @return Illuminate\Support\MessageBag
     */
    public function errors()
    {
    	return $this->errors;
    }
}


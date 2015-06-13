<?php namespace App\Oleyh\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class BaseModel extends Model
{

    protected $validator;

    public function isValid()
    {
        if (is_null($this->getRules())) {
            return true;
        }

        $this->validator = Validator::make($this->getAttributes(), $this->getMergedRules(), $this->getValidationMessages());
        return $this->validator->passes();
    }

    public function getRules()
    {
        return $this->validationRules;
    }

    protected function getMergedRules()
    {
        $rules = $this->getRules();
        $save = @$rules['save'];
        $update = @$rules['update'];
        $create = @$rules['create'];

        if (is_null($save)) {
            $save = array();
        }

        if (is_null($update)) {
            $update = array();
        }
        
        if (is_null($create)) {
            $create = array();
        }

        if ($this->exists) {
            $merged = array_replace_recursive($save, $update);
        } else {
            $merged = array_replace_recursive($save, $create);
        }

        return $merged;
    }

    public function getValidationMessages()
    {
        return $this->validationMessages;
    }

    public function getErrors()
    {
        if (!$this->validator) {
            throw new \Exception('No Validator is set. Make sure isValid is called');
        }

        return $this->validator->errors();
    }

    public function getValidator()
    {
        return $this->validator;
    }
}

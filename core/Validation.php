<?php
/**
 *
 */
class Validation
{
    private $errors = [];

    private $ruleMessages = [];

    public function validate($data, $skip = false)
    {
        $passed = true;

        foreach($data as $placeholder => $rules){

            $value = $rules[0];
            $rules = explode('|', $rules[1]);

            // no need to validate the value if the value is empty and not required
            if(!$this->isRequired($rules) && $this->isEmpty($value)){
                continue;
            }

            // it doesn't make sense to continue and validate the rest of rules on an empty & required value.
            // instead add error, and skip this value.
            if($this->isRequired($rules) && $this->isEmpty($value)){
                $this->addError("required", $placeholder, $value);
                $passed = false;
                continue;
            }

            foreach($rules as $rule){

                $method = $rule;
                $args = [];

                // if it was empty and required or not required,
                // it would be detected by the previous ifs
                if($rule === "required") {
                    continue;
                }

                if(self::isruleHasArgs($rule)){

                    // get arguments for rules like in max(), min(), ..etc.
                    $method = $this->getRuleName($rule);
                    $args   = $this->getRuleArgs($rule);
                }

                if(!method_exists($this, $method)){
                    throw new Exception("Validation method doesnt exists: " . $method);
                }

                if(!call_user_func_array([$this, $method], [$value, $args])) {

                    $this->addError($method, $placeholder, $value, $args);
                    $passed = false;

                    if($skip){ return false; }
                }
            }
        }

        // possible change is to return the current validation object,
        // and use passes() instead.
        return $passed;
    }

    private function isEmpty($value)
    {
        if(is_null($value))
        {
            return true;
        }
        else if(is_string($value))
        {
            if(trim($value) === '') return true;
        }
        else if (empty($value) && $value !== '0' && $value !== false && $value !== 0 && $value !== 0.0)
        {
            return true;
        }
        else if (is_array($value) && isset($value['name'], $value['type'], $value['tmp_name'], $value['error']))
        {
            return (int)$value['error'] === UPLOAD_ERR_NO_FILE;
        }
        return false;
    }

    private function isRequired($rules)
    {
        return in_array("required", $rules, true);
    }

    private function isruleHasArgs($rule)
    {
        return isset(explode('(', $rule)[1]);
    }

    private function getRuleName($rule)
    {
        return explode('(', $rule)[0];
    }

    private  function getRuleArgs($rule)
    {
        $argsWithBracketAtTheEnd = explode('(', $rule)[1];
        $args = rtrim($argsWithBracketAtTheEnd, ')');
        $args = preg_replace('/\s+/', '', $args);

        // as result of an empty array coming from user input
        // $args will be empty string,
        // So, using explode(',', empty string) will return array with size = 1
        // return empty($args)? []: explode(',', $args);
        return explode(',', $args);
    }

    private function addError($rule, $placeholder, $value, $args = [])
    {
        if(isset($this->ruleMessages[$rule])){
            $this->errors[] = $this->ruleMessages[$rule];
        }

        else{

            // get the default message for the current $rule
            $message = self::defaultMessages($rule);

            if(isset($message)){

                // if $message is set to empty string,
                // this means the error will be added inside the validation method itself
                // check attempts()
                if(trim($message) !== ""){

                    // replace placeholder, value, arguments with their values
                    $replace = ['{placeholder}', '{value}'];
                    $value   = is_string($value)? $value: "";
                    $with    = array_merge([$placeholder, $value], $args);
                    $count   = count($args);

                    // arguments will take the shape of: {0} {1} {2} ...
                    for($i = 0; $i < $count; $i++) $replace[] = "{{$i}}";

                    $this->errors[] = str_replace($replace, $with, $message);
                }

            } else{

                // if no message defined, then use this one.
                $this->errors[] = "The value you entered for " . $placeholder . " is invalid";
            }
        }
    }

    public function passes()
    {
        return empty($this->errors);
    }

    public function errors()
    {
        return implode(' | ', $this->errors);
    }

    public function clearErrors()
    {
        $this->errors = [];
    }

    // the functions below are for the specific validation purposes

    private function required($value)
    {
        return !$this->isEmpty($value);
    }

    private function minLen($str, $args)
    {
        return mb_strlen($str, 'UTF-8') >= (int)$args[0];
    }

    private function maxLen($str, $args)
    {
        return mb_strlen($str, 'UTF-8') <= (int)$args[0];
    }

    private function rangeNum($num, $args)
    {
        return $num >= (int)$args[0] && $num <= (int)$args[1];
    }

    private function integer($value)
    {
        return filter_var($value, FILTER_VALIDATE_INT);
    }

    private function inArray($value, $arr)
    {
        if(is_array($value))
        {
            foreach($value as $val)
            {
                if(!in_array($val, $arr, true))
                {
                    return false;
                }
            }
            return true;
        }
        return in_array($value, $arr, true);
    }

    private function alphaNum($value)
    {
        return preg_match('/\A[a-z0-9]+\z/i', $value);
    }

    private function alphaNumWithSpaces($value)
    {
        return preg_match('/\A[a-z0-9 ]+\z/i', $value);
    }

    private function password($value)
    {
        return preg_match_all('$\S*(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $value);
    }

    private function equals($value, $args)
    {
        return $value === $args[0];
    }

    private function notEqual($value, $args)
    {
        return $value !== $args[0];
    }

    private function email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    // the function below is for storing
    // and for selecting the proper message for validation
    private static function defaultMessages($rule){
        $messages = [
            "required"           => "{placeholder} can't be empty",
            "minLen"             => "{placeholder} can't be less than {0} character",
            "maxLen"             => "{placeholder} can't be greater than {0} character",
            "rangeNum"           => "{placeholder} must be between {0} and {1}",
            "integer"            => "{placeholder} must be a valid number",
            "inArray"            => "{placeholder} is not valid",
            "alphaNum"           => "Only letters and numbers are allowed for {placeholder}",
            "alphaNumWithSpaces" => "Only letters, numbers and spaces are allowed for {placeholder}",
            "password"           => "Passwords must contain at least one lowercase, uppercase, number and special character",
            "equals"             => "{placeholder}s aren't equal",
            "notEqual"           => "{placeholder} can't be equal to {0}",
            "email"              => "Invalid email, Please enter a valid email address",
            "unique"             => "{placeholder} already exists"
        ];

        return isset($messages[$rule])? $messages[$rule]: null;
    }

    // end of validation functions.

}

?>

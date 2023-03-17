<?php

namespace App\Validation;

class Validation
{

    private $value;
    private $valueName;
    private $errors = [];


    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function setValueName($valueName)
    {
        $this->valueName = $valueName;

        return $this;
    }

    function required()
    {
        if (empty($this->value)) {
            $this->errors[$this->valueName]["required"] = "{$this->valueName} Is Required";
        }
        return $this;
    }

    function string()
    {
        if (gettype($this->value) != "string") {
            $this->errors[$this->valueName]["string"] = "{$this->value} Must Be String";
        }
        return $this;
    }

    function max($max)
    {
        if (strlen($this->value) > $max) {
            $this->errors[$this->valueName]["max"] = "{$this->valueName} Must be Less Than {$max} characters";
        }
        return $this;
    }

    function regex($regex)
    {
        if (!preg_match($regex, $this->value)) {
            $this->errors[$this->valueName]["regex"] = "{$this->valueName} Is Invalid";
        }
        return $this;
    }

    function confirmed($confirmPass)
    {
        if ($this->value != $confirmPass) {
            $this->errors[$this->valueName]["confirmed"] = " Passwords Don't Match ";
        }
        return $this;
    }

    function in()
    {
        if ($this->value != "male" && $this->value != "female") {
            $this->errors[$this->valueName]["in"] = "{$this->valueName} Is Invalid";
        }
        return $this;
    }

    function unique()
    {

    }

    function exists()
    {
    }
    
    function getErrors()
    {
        return empty($this->errors);
    }

    function getError($property)
    {
        foreach ($this->errors as $prop => $error) {
            if ($prop == $property) {
                foreach ($error as $value) {
                    return $value ;
                }
            }
        }
    }

    function setFormError($property)
    {
        if ($this->getError($property)) { ?>
                <p id="<?php echo $property; ?>" class="text-danger">
                    <small><?php echo $this->getError($property); ?></small>
                </p>
            <?php
        }
        echo "";
    }
}

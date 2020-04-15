<?php

/**
 * Quform_Validator_Required
 *
 * Checks that the given value is not empty
 *
 * @package Quform
 * @subpackage Validator
 * @copyright Copyright (c) 2009-2012 ThemeCatcher (http://www.themecatcher.net)
 */
class Quform_Validator_Required extends Quform_Validator_Abstract
{
    /**
     * Error message templates
     * @var array
     */
    protected $_messageTemplates = array(
        'required' => 'This field is required'
    );

    /**
     * Checks whether the given value is not empty. Also sets
     * the error message if value is empty.
     *
     * @param $value The value to check
     * @return boolean True if valid false otherwise
     */
    public function isValid($value)
    {
        if ($value === null || $value === '') {
            $this->addMessage($this->_messageTemplates['required']);
            return false;
        }

        return true;
    }
}
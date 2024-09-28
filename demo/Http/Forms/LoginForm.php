<?php

namespace Http\Forms;

use Core\Exceptions\ValidationException;
use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if (!Validator::string($attributes['password'], 7, 255)) {
            $this->errors['password'] = 'Please provide a password of at least 7 characters.';
        }
    }

    /**
     * @throws ValidationException
     */
    public static function validate($attributes)
    {
        $instance = new self($attributes);
        return $instance->failed() ? $instance->throw() : $instance;
    }

    /**
     * @throws ValidationException
     */
    public function throw()
    {
        ValidationException::throw([
            'errors' => $this->errors(),
            'old' => $this->attributes
        ]);
    }

    public function failed()
    {
        return !empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
        return $this;
    }
}
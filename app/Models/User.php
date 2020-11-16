<?php
namespace App\Models;

class User
{

    const MIN_PASS_LENGTH = 6;

    const MAX_EMAIL_LENGTH = 50;

    private $user = array();

    public function __construct(array $user)
    {
        $this->user = $user;
    }

    public function get()
    {
        return $this->user;
    }

    public function setPassword($password)
    {
        if (strlen($password) < self::MIN_PASS_LENGTH) {
            return false;
        }

        $this->user['password'] = $this->crypt($password);

        return true;
    }

    public function setEmail($email)
    {
        if (strlen($email) > self::MAX_EMAIL_LENGTH) {
            return false;
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            return false;
        }

        $this->user['email'] = $email;

        return true;
    }

    private function crypt($password)
    {
        return sha1($password);
    }
}
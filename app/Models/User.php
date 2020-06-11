<?php
namespace App\Models;

class User
{
    const MIN_PASS_LENGTH = 6;

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
        if (strlen($password) < self::MIN_PASS_LENGTH)
        {
            return false;
        }

        $this->user['password'] = $this->crypt($password);

        return true;
    }

    private function crypt($password)
    {
        return sha1($password);
    }
}
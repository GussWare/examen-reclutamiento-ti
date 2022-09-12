<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory;

class MY_Security extends CI_Security
{
    protected $passwordHasher;

    public function __construct()
    {
        parent::__construct();

        $factory = new PasswordHasherFactory([
            'common' => ['algorithm' => 'bcrypt'],
            'memory-hard' => ['algorithm' => 'sodium'],
        ]);

        $this->passwordHasher = $factory->getPasswordHasher('common');
    }

    public function get_password($password)
    {
        $hash = $this->passwordHasher->hash($password);

        return $hash;
    }


    public function verify_password($password, $hash)
    {
        $verify = $this->passwordHasher->verify($hash, $password);

        return $verify;
    }
}

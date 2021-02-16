<?php

namespace Src\Model;

interface UserModelInterface{

	public function login();

	public function get();
    
    public function create();

    public function getUserId();

	public function setUserId(int $user_id);

	public function getName();

	public function setName(string $name);

	public function getEmail();

	public function setEmail(string $email);

	public function getPassword();

	public function setPassword(string $password);
}
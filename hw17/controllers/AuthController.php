<?php

class AuthController {
    use Validator;

    public function register($data) {
        $this->validate($data, AUTH_VALIDATION_SCHEMA);
    }

    public function login($data) {
        $this->validate($data, AUTH_VALIDATION_SCHEMA);
    }

    public function logout($id) {
        $this->validate(['id' => $id], ID_VALIDATION_SCHEMA);
    }
}
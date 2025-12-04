<?php

class Client {
    public string $nom;
    public string $email;

    public function __construct(string $nom, string $email) {
        $this->nom = $nom;
        $this->email = $email;
    }
}

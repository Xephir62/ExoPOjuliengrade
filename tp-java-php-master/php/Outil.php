<?php 

class outil{


    private $nom;
    private $prix;
    private $dispo;

    public function __construct($nom, $prix, $dispo = true){
        $this->nom = $nom;
        $this->prix = $prix;
        $this->dispo = $dispo;
    }

    public function getNom(): string{
        return $this->nom;
    }

    public function getPrix(): float{
        return $this->prix;
    }

    public function isDisponible(): bool{
        return $this->dispo;
    }

    public function louer(): void{
        $this->dispo = false;
    }

    public function retourner(): void{
        $this->dispo = true;
    }


}
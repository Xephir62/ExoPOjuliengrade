<?php

class Catalogue{

    private $outils;

    public function __construct(){
        $this->outils = [];
    }

    public function ajouterOutil(Outil $outil): void{
        $this->outils[] = $outil;
    }

    public function supprimerOutil(int $index): void{
        if (isset($this->outils[$index])){
            array_splice($this->outils, $index, 1);
        }
    }

    public function listerOutils(): array{
        return $this->outils;
    }

    public function getOutilParIndex(int $index): ?Outil{
        if (isset($this->outils[$index])){
            return $this->outils[$index];
        }
        return null;
    }

    public function louerOutil(int $index, int $jours): ?float{
        $outil = $this->getOutilParIndex($index);
        if ($outil !== null && $outil->isDisponible()){
            $outil->louer();
            return $outil->getPrix() * $jours;
        }
        return null;
    }

    public function retournerOutil(int $index): bool{
        $outil = $this->getOutilParIndex($index);
        if ($outil !== null && !$outil->isDisponible()){
            $outil->retourner();
            return true;
        }
        return false;
    }

}
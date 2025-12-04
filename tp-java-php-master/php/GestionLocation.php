<?php

class GestionLocation {

    public $catalogue;

    public function __construct(Catalogue $catalogue){
        $this->catalogue = $catalogue;
    }

    public function listerOutils(): void{
        $outils = $this->catalogue->listerOutils();
        foreach ($outils as $index => $outil){
            $status = $outil->isDisponible() ? "DISPONIBLE" : "LOUE";
            echo $index . " - " . $outil->getNom()
                . " | " . $outil->getPrix() . " €/jour"
                . " | " . $status . "\n";
        }
    }

    public function louerOutil(int $index, int $jours): ?float{
        return $this->catalogue->louerOutil($index, $jours);
    }

    public function retournerOutil(int $index): bool{
        return $this->catalogue->retournerOutil($index);
    }

    public function prixOutil(int $index): ?float{
        $outil = $this->catalogue->getOutilParIndex($index);
        return $outil ? $outil->getPrix() : null;
    }

    public function estDisponible(int $index): ?bool{
        $outil = $this->catalogue->getOutilParIndex($index);
        return $outil ? $outil->isDisponible() : null;
    }

    public function calcuerprixTotal(int $index, int $jours): ?float{
        $prixParJour = $this->prixOutil($index);
        if ($prixParJour !== null){
            return $prixParJour * $jours;
        }
        return null;
    }

}
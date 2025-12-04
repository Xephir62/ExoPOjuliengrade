<?php

class Location {
    public Client $client;
    public Outil $outil;
    public int $jours;
    public float $prixTotal;
    public DateTime $date;

    public function __construct(Client $client, Outil $outil, int $jours, float $prixTotal) {
        $this->client = $client;
        $this->outil = $outil;
        $this->jours = $jours;
        $this->prixTotal = $prixTotal;
        $this->date = new DateTime();
    }
}

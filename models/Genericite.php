<?php
class Genericite {
    private $biblothecaire;
    private $rapport;
    private $date;

    public function __construct(Biblothecaire $biblothecaire,Rapport $rapport,$date)
    {
        $this->biblothecaire=$biblothecaire;
        $this->rapport=$rapport;
        $this->date=$date;
    }
}

?>
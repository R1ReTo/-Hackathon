<?php
namespace App\Service;
use PDO;
class PdoHackathon
{
    private static $monPdo;
    public function __construct($serveur,$bdd,$user,$mdp){
        PdoHackathon::$monPdo=new PDO($serveur.';'.$bdd,$user,$mdp);
        PdoHackathon::$monPdo->query("SETCHARACTERSETutf8");
    }
}
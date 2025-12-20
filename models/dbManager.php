<?php

/**
 * DBManager : class pour la connexion à la base de données
 * Cette classe est un singleton. Cela signifie qu'il n'est pas possible de créer plusieurs instances de cette classe
 * Pour récupérer une instance de cette classe, il faut uiliser la méthode getIntance()
 *
 */
class DBManager {

    //Classe singleton permettant de se connecter à la base données
    //création d'une instance de la class DBCoonect qui permet de se connecter à la base de données
    private static $instance;

    private $db;

    /**
     * Constructeur de la class DBManager
     * Initialise la connexion à la base de données
     * Ce constructeur est privé. Pour récupérer une instance de la classe, il faut utiliser la méthode getInstance()
     * @see DBManager::getInstalce()
     */
    private function __construct(){
        //Connexion à la base de données
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

}

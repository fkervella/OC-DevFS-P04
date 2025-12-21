<?php

/**
 * \brief Classe abstraite représentant un manager récupérant automatiquement le gestionnaire de base de données
 */

abstract class AbstractEntityManager {

    /** 
     * db variable contenant l'instance de la base de données
     */
    protected $db;

    /**
     * Constructeur de la classe.
     * Récupère automatiquement l'instance de DBManager
     */
    public function __construct() {

        $this->db = DBManager::getInstance();
    }
}

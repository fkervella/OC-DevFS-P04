<?php

/**
 * \brief Classe pour la connexion à la base de données.
 *
 * Cette classe est un singleton. Cela signifie qu'il n'est pas possible de créer plusieurs instances de cette classe.
 * Pour récupérer une instance de cette classe, il faut uiliser la méthode getIntance().
 */
class DBManager
{
    // Instance de DBManager
    private static $instance;

    // Objet PDO de connexion à la base de données
    private $db;

    /**
     * Constructeur de la classe DBManager.
     * Initialise la connexion à la base de données.
     * Ce constructeur est privé. Pour récupérer une instance de la classe, il faut utiliser la méthode getInstance().
     *
     * @see DBManager::getInstance().
     */
    private function __construct()
    {
        // Connexion à la base de données
        $this->db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    /**
     * Récupération de l'instance de la classe DBManager.
     */
    public static function getInstance(): DBManager
    {
        if (!self::$instance) {
            self::$instance = new DBManager();
        }

        return self::$instance;
    }

    /**
     * Récupération de l'objet PDO permettant de se connecter à la base de données.
     */
    public function getPDO(): PDO
    {
        return $this->db;
    }

    /**
     * Exécution d'une requête SQL.
     * Si des paramètres sont passés, utilisation d'une requête préparée.
     *
     * @param string     $sql    : requête SQL à exécuter
     * @param null|array $params : paramètres de la requête SQL
     *
     * @return PDOStatement : résultat de la requête SQL
     */
    public function query(string $sql, ?array $params = null): PDOStatement
    {
        if (null == $params) {
            $query = $this->db->query($sql);
        } else {
            $query = $this->db->prepare($sql);
            $query->execute($params);
        }

        return $query;
    }
}

<?php

namespace MyBooks\DAO;

use Doctrine\DBAL\Connection;

abstract class DAO
{
    /**
     * Database connection
     * 
     * @var \Doctrine\DBAL\Connection
     */
    private $db;
    
    /**
     * Constructor
     * 
     * @param \Doctrine\DBAL\Connection The database connection object
     */
    public function __construct(Connection $db) {
        $this->db = $db;
    }
    
    /**
     * Grants access to the database connection object
     * 
     * @return \Doctrine\DBAL\Connection The database connection object
     */
    protected function getDB() {
        return $this->db;
    }
    
    /**
     * Builds a domain obejct from a DB row.
     * Must be overriden by child classes.
     */
    protected abstract function buildDomainObject($row);
}
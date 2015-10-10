<?php

namespace MyBooks\DAO;

use MyBooks\Domain\Author;

class AuthorDAO extends \MyBooks\DAO\DAO
{
    /**
     * Returns an author matching the supplied id.
     * 
     * @param integer $id
     * 
     * @return \MyBooks\Domain\Author|throws an exception if no matching author is found
     */
    public function find($id) {
        $sql = "select * from author where auth_id=?";
        $row = $this->getDB()->fetchAssoc($sql, array($id));
        
        if ($row) {
            return $this->buildDomainObject($row);
        } else {
            throw new \Exception("No author matching id ", $id);
        }
    }
    
    /**
     * 
     * @param array $row The DB row containing Author data.
     * @return \MyBooks\Domain\Author
     */
    protected function buildDomainObject($row) {
        $author = new Author();
        $author->setId($row['auth_id']);
        $author->setFirstname($row['auth_first_name']);
        $author->setLastname($row['auth_last_name']);
        return $author;
    }
}
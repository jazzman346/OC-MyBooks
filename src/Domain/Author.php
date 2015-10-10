<?php

namespace MyBooks\Domain;

class Author
{
    /**
     * Author id.
     * 
     * @var integer
     */
    private $id;
    
    /**
     * Author first name.
     * 
     * @var string
     */
    private $firstname;
    
    /**
     * Author last name
     * 
     * @var string
     */
    private $lastname;
    
    function getId() {
        return $this->id;
    }

    function getFirstname() {
        return $this->firstname;
    }

    function getLastname() {
        return $this->lastname;
    }
    
    function getFullname() {
        return $this->firstname . " " . $this->lastname;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setLastname($lastname) {
        $this->lastname = $lastname;
    }
}

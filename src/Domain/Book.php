<?php

namespace MyBooks\Domain;

class Book
{
    /**
     * Book id.
     * 
     * @var integer
     */
    private $id;
    
    /**
     * Book title.
     * 
     * @var string
     */
    private $title;
    
    /**
     * Book ISBN.
     * 
     * @var string
     */
    private $isbn;
    
    /**
     * Summary.
     * 
     * @var string
     */
    private $summary;
    
    /**
     * Author.
     * 
     * @var \MyBooks\Domain\Author
     */
    private $author;
    
    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getIsbn() {
        return $this->isbn;
    }

    function getSummary() {
        return $this->summary;
    }

    function getAuthor() {
        return $this->author;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    function setSummary($summary) {
        $this->summary = $summary;
    }

    function setAuthor(Author $author) {
        $this->author = $author;
    }


}
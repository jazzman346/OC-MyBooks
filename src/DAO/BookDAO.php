<?php

namespace MyBooks\DAO;

use MyBooks\Domain\Book;

class BookDAO extends DAO
{
    /**
     * Associated AuthorDAO.
     * 
     * @var \MyBooks\DAO\AuthorDAO
     */
    private $authorDAO;
    
    /**
     * Returns a list of all books, sorted by date (most recent first).
     */
    public function findAll() {
        $sql = "select * from book order by book_id desc";
        $result = $this->getDB()->fetchAll($sql);
        
        // Convert query result to an array of domain objects
        $books = array();
        foreach ($result as $row) {
            $bookId = $row['book_id'];
            $books[$bookId] = $this->buildDomainObject($row);
        }
        return $books;        
    }
    
    /*
     * Returns a book matching the supplied id.
     * 
     * @param integer $id
     * @return \MyBooks\Domain\Book|throws an exception if no matching book is found    
     */
    public function find($id) {
        $sql = "select * from book where book_id=?";
        $row = $this->getDB()->fetchAssoc($sql, array($id));
        
        if ($row) {
            return $this->buildDomainObject($row);
        } else {
            throw new \Exception("No book maching id " . $id);
        }
    }
    
    /**
     * Setting the reference to authorDAO
     * 
     * @param \MyBooks\DAO\AuthorDAO $authorDAO
     */
    public function setAuthorDAO(AuthorDAO $authorDAO) {
        $this->authorDAO = $authorDAO;
    }

    /**
     * Creates a Book object based on a DB row.
     * 
     * @param array $row The DB row containing the Book data.
     * @return \MyBooks\Domain\Book
     */    
    protected function buildDomainObject($row) {
        $book = new Book();
        $book->setId($row['book_id']);
        $book->setTitle($row['book_title']);
        $book->setIsbn($row['book_isbn']);
        $book->setSummary($row['book_summary']);
        $book->setAuthor($this->authorDAO->find($row['auth_id']));
        return $book;
    }

}
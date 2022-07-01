<?php
require_once "./dal/factory/DaoFactory.php";
require_once "./service/BookService.php";
require_once "./util/HtmlResponseCreator.php";

class BookServiceImpl implements BookService
{
    private BookDao $bookDao;

    public function __construct()
    {
        DaoFactory::factoryInitialization();
        $this->bookDao = DaoFactory::getInstance()->getBookDao();
    }

    public function addBookToStorage(Book $book): void
    {
        $this->bookDao->createBook($book);
    }

    public function readAllBooks(): string
    {

        $books = $this->bookDao->readAllBooks();
        return HtmlResponseCreator::showBooksResponse($books);
    }

}
<?php
require_once "./service/BookService.php";

class ServiceFactory
{
    private static ServiceFactory $instance;
    private static bool $isInitialized = false;

    private BookService $bookDao;

    private function __construct()
    {
        $this->bookDao = new BookServiceImpl();
    }

    public static function init(): void
    {
        if(!self::$isInitialized){
            self::$instance = new ServiceFactory();
            self::$isInitialized = true;
        }
    }

    public static function getInstance(): ServiceFactory
    {
        if (self::$isInitialized) {
            return self::$instance;
        } else {
            //todo create custom Service exception and execute it in the uppers layers.
            throw new \http\Exception\RuntimeException("The factory hadn't initialized!");
        }
    }

    public function getBookService(): BookService
    {
        return $this->bookDao;
    }


}
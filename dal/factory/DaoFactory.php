<?php

class DaoFactory
{
    private static DaoFactory $instance;
    private static bool $isInitialized = false;

    private BookDao $bookDao;

    private function __construct()
    {
        $this->bookDao = new BookDaoImpl();
    }

    public static function factoryInitialization(): void
    {
        if(!self::$isInitialized){
            self::$instance = new DaoFactory();
            self::$isInitialized = true;
        }
    }

    /**
     * @return DaoFactory
     */
    public static function getInstance(): DaoFactory
    {
        if (self::$isInitialized) {
            return self::$instance;
        } else {
            //todo create custom Dao exception and execute it in the uppers layers.
            throw new \http\Exception\RuntimeException("The factory hadn't initialized!");
        }
    }

    public function getBookDao(): BookDao
    {
        return $this->bookDao;
    }


}
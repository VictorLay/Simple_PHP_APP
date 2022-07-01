<?php

class ShowAllBooks implements Command
{
    public function execute(): void
    {
        ServiceFactory::init();
        $bookService = ServiceFactory::getInstance()->getBookService();
        $readAllBooksResponse = $bookService->readAllBooks();
        echo $readAllBooksResponse;
    }

}
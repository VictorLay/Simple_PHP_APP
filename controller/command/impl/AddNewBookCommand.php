<?php

require_once "./controller/command/Command.php";
require_once "./bean/Book.php";

class AddNewBookCommand implements Command
{
    public function execute(): void
    {
        $book = new Book($_POST['isbn'], $_POST['title'], $_POST['price']);

        ServiceFactory::init();
        $serviceFactory = ServiceFactory::getInstance();
        $bookService = $serviceFactory->getBookService();
        $bookService->addBookToStorage($book);

        $new_url = 'http://www.localhost/victor/Authorization.php?command=show_all_books';
        header('Location: '.$new_url);
    }

}
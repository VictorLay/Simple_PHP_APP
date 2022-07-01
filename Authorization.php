<?php

require_once "./bean/Book.php";
require_once "./dal/impl/BookDaoImpl.php";
require_once "./dal/factory/DaoFactory.php";
require_once "./service/impl/BookServiceImpl.php";
require_once "./service/factory/ServiceFactory.php";
require_once "./controller/command/CommandProvider.php";

CommandProvider::init();

if (array_key_exists("command", $_POST)) {
    $command = CommandProvider::getCommand($_POST['command']);
    $command->execute();
} else{
    if (array_key_exists("command", $_GET)) {
        $command = CommandProvider::getCommand($_GET['command']);
        $command->execute();
    } else {
        $command = CommandProvider::getCommand("show_all_books");
        $command->execute();
    }
}





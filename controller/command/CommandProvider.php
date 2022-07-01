<?php
require_once "./controller/command/Command.php";
require_once "./controller/command/impl/AddNewBookCommand.php";
require_once "./controller/command/impl/ShowAllBooks.php";

class CommandProvider
{

    private static array $commands;

    private function __construct(){}

    public static function init()
    {
        self::$commands["add_new_book"] = new AddNewBookCommand();
        self::$commands["show_all_books"] = new ShowAllBooks();
    }

    public static function getCommand(string $commandName): Command{
        return self::$commands[$commandName];
    }

}
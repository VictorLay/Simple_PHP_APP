<?php

interface BookDao
{
    public function createBook(Book $book): void;

    public function readAllBooks():array;
}
<?php

interface BookService
{
    public function addBookToStorage(Book $book): void;

    public function readAllBooks(): string;
}
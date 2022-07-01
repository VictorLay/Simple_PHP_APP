<?php
require "./dal/BookDao.php";

class BookDaoImpl implements BookDao
{
    private const CREATE_QUERY = "INSERT INTO mydbtest.books (`isbn`, `title`, `price`, `genre_id`,
                            `publishing_id`, `year`) VALUES (?, ? , ?, 1,1,1968);";

    public function createBook(Book $book): void
    {
        $connection = new mysqli('localhost', 'root', 'root', 'mydbtest', 3300);

        $statement = $connection->prepare(self::CREATE_QUERY);

        $isbn = $book->getIsbn();
        $title = $book->getTitle();
        $price = $book->getPrice();
        $statement->bind_param("isd", $isbn, $title, $price);

        $statement->execute();

        $connection->close();
    }

    public function readAllBooks(): array
    {

        $connection = new mysqli('localhost', 'root', 'root', 'mydbtest', 3300);
        $statement = $connection->prepare("SELECT `isbn`, `title`, `price` FROM mydbtest.books;");
        //todo refactor query to the separate pars with ten or fifteen books.

        $statement->execute();
        $statement->bind_result($isbn, $title, $price );
        while ($statement->fetch()) {
            $books[] = new Book($isbn, $title, $price);
        }

        $connection->close();
       return $books;
    }


}
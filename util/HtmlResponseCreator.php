<?php

class HtmlResponseCreator
{

    public static function showBooksResponse(array $books): string
    {
        $response = "
    <table>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>price</th>
        </tr>";


        foreach ($books as $book) {
            $response = $response . "    
        <tr>
            <td>" . $book->getIsbn() . "</td>
            <td>" . $book->getTitle() . "</td>
            <td>" . $book->getPrice() . "</td>
        </tr>";
        }

        return $response . "</table> <div><a href='add_book_form.html'>Add new book</a></div>";
    }
}
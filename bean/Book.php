<?php
class Book
{
    private int $isbn;
    private string $title;
    private float $price;

    /**
     * @param int $isbn
     * @param string $title
     * @param float $price
     */
    public function __construct(int $isbn, string $title, float $price)
    {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->price = $price;
    }


    /**
     * @return int
     */
    public function getIsbn(): int
    {
        return $this->isbn;
    }

    /**
     * @param int $isbn
     */
    public function setIsbn(int $isbn): void
    {
        $this->isbn = $isbn;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

}
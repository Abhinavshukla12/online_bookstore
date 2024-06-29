<?php

namespace App\Models\ProjectModel;

use CodeIgniter\Model;
use App\Models\ProjectModel\BookModel;

class CartModel extends Model
{
    protected $table = 'cart'; // Adjust this based on your database table name
    protected $primaryKey = 'id'; // Primary key of your cart table
    protected $allowedFields = ['book_id', 'quantity']; // Fields allowed for insertion

    // Load BookModel for retrieving book details
    protected $bookModel;

    public function __construct()
    {
        parent::__construct();
        $this->bookModel = new BookModel();
    }

    public function getCartItemsWithDetails()
    {
        $cartItems = $this->findAll(); // Fetch all items from the cart table

        // Fetch book details for each cart item
        foreach ($cartItems as &$item) {
            $book = $this->bookModel->find($item['book_id']);
            if ($book) {
                $item['title'] = $book['title'];
                $item['author'] = $book['author'];
                $item['price'] = $book['price'];
                // Add more fields as needed
            }
        }

        return $cartItems;
    }

    public function addToCart($bookId)
    {
        // Example method to add a book to cart, adjust according to your requirements
        // Example implementation, adjust as per your actual database structure and logic
        $this->insert(['book_id' => $bookId, 'quantity' => 1]);
    }

    public function removeFromCart($cartId)
    {
        // Example method to remove an item from cart, adjust according to your requirements
        // Example implementation, adjust as per your actual database structure and logic
        $this->delete($cartId);
    }
}

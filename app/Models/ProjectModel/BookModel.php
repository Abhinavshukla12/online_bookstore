<?php

namespace App\Models\ProjectModel;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'author', 'description', 'price', 'image', 'bestseller', 'category_id'];

    // Add method to get all books excluding bestsellers
    public function getAllBooks()
    {
        return $this->where('bestseller', 0)->findAll();
    }

    // Add method to get books by category
    public function getBooksByCategory($categoryId)
    {
        return $this->where('category_id', $categoryId)->findAll();
    }

    // Add method to search books
    public function searchBooks($query)
    {
        return $this->like('title', $query)
                    ->orLike('author', $query)
                    ->orLike('description', $query)
                    ->findAll();
    }
}

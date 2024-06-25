<?php

namespace App\Models\ProjectModel;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'author', 'description', 'price', 'image', 'bestseller'];

    // Add method to get all books excluding bestsellers
    public function getAllBooks()
    {
        return $this->where('bestseller', 0)->findAll();
    }
}

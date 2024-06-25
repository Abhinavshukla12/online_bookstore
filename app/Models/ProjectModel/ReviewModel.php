<?php

namespace App\Models\ProjectModel;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $allowedFields = ['book_id', 'user_id', 'rating', 'comment'];
    
    public function getReviewsByBook($book_id)
    {
        return $this->where('book_id', $book_id)->findAll();
    }
}

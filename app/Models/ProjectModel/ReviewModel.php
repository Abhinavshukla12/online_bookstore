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

    public function getLatestReviewsByBook($book_id, $limit = 3)
    {
        return $this->where('book_id', $book_id)->orderBy('created_at', 'DESC')->limit($limit)->findAll();
    }

    public function getAverageRating($book_id)
    {
        $this->selectAvg('rating');
        $this->where('book_id', $book_id);
        $query = $this->get();
        return $query->getRow()->rating;
    }

    public function getLatestHighRatingReviews($limit = 4)
    {
        return $this->where('rating >=', 4)->orderBy('created_at', 'DESC')->limit($limit)->findAll();
    }
}

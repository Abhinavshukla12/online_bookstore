<?php

namespace App\Models\ProjectModel;

use CodeIgniter\Model;

class WishlistModel extends Model
{
    protected $table = 'wishlist';
    protected $allowedFields = ['user_id', 'book_id', 'created_at'];

    public function addToWishlist($userId, $bookId)
    {
        $data = [
            'user_id' => $userId,
            'book_id' => $bookId,
        ];

        return $this->insert($data);
    }

    public function getUserWishlist($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }
}

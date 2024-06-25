<?php

namespace App\Models\ProjectModel;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $allowedFields = ['book_id', 'user_id', 'quantity', 'total_price', 'created_at', 'updated_at'];

    public function getOrdersByUser($user_id)
    {
        return $this->where('user_id', $user_id)->findAll();
    }
}

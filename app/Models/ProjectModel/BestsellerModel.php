<?php

namespace App\Models\ProjectModel;

use CodeIgniter\Model;

class BestsellerModel extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';

    public function getBestsellers()
    {
        return $this->where('bestseller', 1)->findAll();
    }
}

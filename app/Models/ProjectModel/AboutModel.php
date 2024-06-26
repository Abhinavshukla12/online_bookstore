<?php

namespace App\Models\ProjectModel;

use CodeIgniter\Model;

class AboutModel extends Model
{
    protected $table = 'about';
    protected $primaryKey = 'id';
    protected $allowedFields = ['section', 'title', 'content'];

    public function getAboutSection($section)
    {
        return $this->where('section', $section)->findAll();
    }
}

<?php

namespace App\Controllers\ProjectControllers;

use App\Controllers\BaseController;
use App\Models\ProjectModel\ReviewModel;

class ReviewController extends BaseController
{
    public function add()
    {
        $reviewModel = new ReviewModel();

        $data = [
            'book_id' => $this->request->getPost('book_id'),
            'user_id' => session()->get('user')['id'], // Assuming user session contains user info
            'rating' => $this->request->getPost('rating'),
            'comment' => $this->request->getPost('comment'),
        ];

        if ($reviewModel->insert($data)) {
            return redirect()->back()->with('success', 'Review added successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to add review');
        }
    }
}

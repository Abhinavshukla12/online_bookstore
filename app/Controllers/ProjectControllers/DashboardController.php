<?php

namespace App\Controllers\ProjectControllers;

use App\Controllers\BaseController;
use App\Models\ProjectModel\BookModel;
use App\Models\ProjectModel\BestsellerModel;
use App\Models\ProjectModel\ReviewModel;
use App\Models\ProjectModel\CategoryModel;

class DashboardController extends BaseController
{
    public function index()
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return redirect()->to(site_url('project/login'))->with('error', 'Please login to access the dashboard.');
        }

        $bookModel = new BookModel();
        $bestsellerModel = new BestsellerModel();
        $reviewModel = new ReviewModel();
        $categoryModel = new CategoryModel();

        $bestsellers = $bestsellerModel->getBestsellers();
        foreach ($bestsellers as &$book) {
            $reviews = $reviewModel->getReviewsByBook($book['id']);
            $book['avg_rating'] = count($reviews) ? $reviewModel->getAverageRating($book['id']) : null;
            $book['latest_reviews'] = $reviewModel->getLatestReviewsByBook($book['id']);
        }

        $data = [
            'bestsellers' => $bestsellers,
            'categories' => $categoryModel->findAll(),
            'userReviews' => $reviewModel->getLatestHighRatingReviews()
        ];

        return view('ProjectViews/dashboard/index',$data);
    }
}
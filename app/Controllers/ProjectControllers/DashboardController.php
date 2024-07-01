<?php

namespace App\Controllers\ProjectControllers;

use App\Controllers\BaseController;
use App\Models\ProjectModel\BookModel;
use App\Models\ProjectModel\BestsellerModel;
use App\Models\ProjectModel\ReviewModel;
use App\Models\ProjectModel\CategoryModel;

class DashboardController extends BaseController
{
    protected $bookModel;
    protected $bestsellerModel;
    protected $reviewModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();
        $this->bestsellerModel = new BestsellerModel();
        $this->reviewModel = new ReviewModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return redirect()->to(site_url('project/login'))->with('error', 'Please login to access the dashboard.');
        }

        // Get all bestsellers
        $bestsellers = $this->bestsellerModel->getBestsellers();

        // Initialize array for filtered bestsellers
        $filteredBestsellers = [];

        // Filter bestsellers based on average rating >= 4
        foreach ($bestsellers as $book) {
            $avgRating = $this->reviewModel->getAverageRating($book['id']);
            if ($avgRating >= 4) {
                $book['avg_rating'] = $avgRating;
                $book['latest_reviews'] = $this->reviewModel->getLatestReviewsByBook($book['id']);
                $filteredBestsellers[] = $book;
            }
        }

        // Limit to 4 bestsellers
        $limitedBestsellers = array_slice($filteredBestsellers, 0, 4);

        $data = [
            'bestsellers' => $limitedBestsellers,
            'categories' => $this->categoryModel->findAll(),
            'reviewModel' => $this->reviewModel,
            'userReviews' => $this->reviewModel->getLatestHighRatingReviews()
        ];

        return view('ProjectViews/dashboard/index', $data);
    }
}

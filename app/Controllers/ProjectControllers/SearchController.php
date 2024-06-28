<?php

namespace App\Controllers\ProjectControllers;

use App\Models\ProjectModel\BookModel;
use App\Models\ProjectModel\ReviewModel;
use CodeIgniter\Controller;

class SearchController extends Controller
{
    public function index() 
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return redirect()->to(site_url('project/login'))->with('error', 'Please login to access the dashboard.');
        }

        $query = $this->request->getGet('query');
        if (empty($query)) {
            return view('ProjectViews/search/search_results', [
                'validationError' => 'Please enter a search query.',
                'results' => []
            ]);
        }

        $bookModel = new BookModel();
        $reviewModel = new ReviewModel(); // Create an instance of ReviewModel

        $results = $bookModel->searchBooks($query);

        // Calculate average ratings for search results
        foreach ($results as &$book) {
            $reviews = $reviewModel->getReviewsByBook($book['id']);
            $averageRating = 0;
            if (!empty($reviews)) {
                $totalRating = array_sum(array_column($reviews, 'rating'));
                $averageRating = $totalRating / count($reviews);
            }
            $book['averageRating'] = $averageRating;
        }

        return view('ProjectViews/search/search_results', ['results' => $results]);
    }
}

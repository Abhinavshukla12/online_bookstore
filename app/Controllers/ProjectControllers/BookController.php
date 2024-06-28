<?php

namespace App\Controllers\ProjectControllers;

use App\Controllers\BaseController;
use App\Models\ProjectModel\BookModel;
use App\Models\ProjectModel\BestsellerModel;
use App\Models\ProjectModel\ReviewModel;
use App\Models\ProjectModel\CategoryModel; // Import CategoryModel

class BookController extends BaseController
{
    public function index()
{
    // Check if user is logged in
    if (!session()->has('user')) {
        return redirect()->to(site_url('project/login'))->with('error', 'Please login to access the dashboard.');
    }

    $bookModel = new BookModel();
    $bestsellerModel = new BestsellerModel();
    $reviewModel = new ReviewModel(); // Add ReviewModel
    $categoryModel = new CategoryModel(); // Create an instance of CategoryModel

    $books = $bookModel->getAllBooks();
    $bestsellers = $bestsellerModel->getBestsellers();
    $categories = $categoryModel->findAll(); // Fetch all categories

    // Calculate average ratings for books
    foreach ($books as &$book) {
        $reviews = $reviewModel->getReviewsByBook($book['id']);
        $averageRating = 0;
        if (!empty($reviews)) {
            $totalRating = array_sum(array_column($reviews, 'rating'));
            $averageRating = $totalRating / count($reviews);
        }
        $book['averageRating'] = $averageRating;
    }

    // Calculate average ratings for bestsellers
    foreach ($bestsellers as &$book) {
        $reviews = $reviewModel->getReviewsByBook($book['id']);
        $averageRating = 0;
        if (!empty($reviews)) {
            $totalRating = array_sum(array_column($reviews, 'rating'));
            $averageRating = $totalRating / count($reviews);
        }
        $book['averageRating'] = $averageRating;
    }

    return view('ProjectViews/books/index', [
        'books' => $books,
        'bestsellers' => $bestsellers,
        'categories' => $categories // Pass categories to the view
    ]);
}

    public function view($id)
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return redirect()->to(site_url('project/login'))->with('error', 'Please login to access the dashboard.');
        }

        $bookModel = new BookModel();
        $reviewModel = new ReviewModel();
        $categoryModel = new CategoryModel(); // Create an instance of CategoryModel

        $book = $bookModel->find($id);
        if (!$book) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Book not found');
        }

        $reviews = $reviewModel->getReviewsByBook($id);
        $category = $categoryModel->find($book['id']); // Get category based on book's category ID

        // Calculate average rating
        $averageRating = 0;
        if (!empty($reviews)) {
            $totalRating = array_sum(array_column($reviews, 'rating'));
            $averageRating = $totalRating / count($reviews);
        }

        return view('ProjectViews/books/view', [
            'book' => $book,
            'reviews' => $reviews,
            'category' => $category,
            'averageRating' => $averageRating // Pass average rating to the view
        ]);
    }

    public function categories()
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return redirect()->to(site_url('project/login'))->with('error', 'Please login to access the dashboard.');
        }

        $categoryModel = new CategoryModel(); // Create an instance of CategoryModel
        $categories = $categoryModel->findAll(); // Fetch all categories

        return view('ProjectViews/categories/index', [
            'categories' => $categories // Pass categories to the view
        ]);
    }

    public function category($id)
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return redirect()->to(site_url('project/login'))->with('error', 'Please login to access the dashboard.');
        }
    
        $categoryModel = new CategoryModel(); // Create an instance of CategoryModel
        $bookModel = new BookModel(); // Create an instance of BookModel
        $reviewModel = new ReviewModel(); // Create an instance of ReviewModel
    
        $category = $categoryModel->find($id);
        if (!$category) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Category not found');
        }
    
        $books = $bookModel->getBooksByCategory($id); // Get books by category ID
    
        // Calculate average ratings for books
        foreach ($books as &$book) {
            $reviews = $reviewModel->getReviewsByBook($book['id']);
            $averageRating = 0;
            if (!empty($reviews)) {
                $totalRating = array_sum(array_column($reviews, 'rating'));
                $averageRating = $totalRating / count($reviews);
            }
            $book['averageRating'] = $averageRating;
        }
    
        return view('ProjectViews/categories/category_books', [
            'category' => $category,
            'books' => $books // Pass books to the view
        ]);
    }    
}
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
        $categoryModel = new CategoryModel(); // Create an instance of CategoryModel

        $books = $bookModel->getAllBooks();
        $bestsellers = $bestsellerModel->getBestsellers();
        $categories = $categoryModel->findAll(); // Fetch all categories

        return view('ProjectViews/books/index', [
            'books' => $books,
            'bestsellers' => $bestsellers,
            'categories' => $categories // Pass categories to the view
        ]);
    }

    public function view($id)
    {
        $bookModel = new BookModel();
        $reviewModel = new ReviewModel();
        $categoryModel = new CategoryModel(); // Create an instance of CategoryModel

        $book = $bookModel->find($id);
        if (!$book) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Book not found');
        }

        $reviews = $reviewModel->getReviewsByBook($id);
        $category = $categoryModel->find($book['id']); // Get category based on book's category ID

        return view('ProjectViews/books/view', [
            'book' => $book,
            'reviews' => $reviews,
            'category' => $category
        ]);
    }

    public function categories()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();

        return view('ProjectViews/books/categories', [
            'categories' => $categories
        ]);
    }

    public function category($categoryId)
    {
        $bookModel = new BookModel();
        $categoryModel = new CategoryModel();

        $books = $bookModel->getBooksByCategory($categoryId);
        $category = $categoryModel->find($categoryId);

        if (!$category) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Category not found');
        }

        return view('ProjectViews/books/categories', [
            'books' => $books,
            'category' => $category
        ]);
    }
}

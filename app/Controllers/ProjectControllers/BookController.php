<?php

namespace App\Controllers\ProjectControllers;

use App\Controllers\BaseController;
use App\Models\ProjectModel\BookModel;
use App\Models\ProjectModel\BestsellerModel;
use App\Models\ProjectModel\ReviewModel;

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

        $books = $bookModel->getAllBooks();
        $bestsellers = $bestsellerModel->getBestsellers();

        return view('ProjectViews/books/index', [
            'books' => $books,
            'bestsellers' => $bestsellers
        ]);
    }

    public function view($id)
    {
        $bookModel = new BookModel();
        $reviewModel = new ReviewModel();

        $book = $bookModel->find($id);
        if (!$book) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Book not found');
        }

        $reviews = $reviewModel->getReviewsByBook($id);

        return view('ProjectViews/books/view', [
            'book' => $book,
            'reviews' => $reviews
        ]);
    }
}
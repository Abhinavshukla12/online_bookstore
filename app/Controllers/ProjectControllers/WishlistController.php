<?php

namespace App\Controllers\ProjectControllers;

use App\Controllers\BaseController;
use App\Models\ProjectModel\WishlistModel;
use CodeIgniter\Controller;

class WishlistController extends BaseController
{
    protected $wishlistModel;

    public function __construct()
    {
        $this->wishlistModel = new WishlistModel();
    }

    public function add()
    {
        // Check if user is logged in
        if (!session()->has('user_id')) {
            return redirect()->to(site_url('project/login'))->with('error', 'Please login to add to wishlist.');
        }

        // Retrieve book_id from form post
        $bookId = $this->request->getPost('book_id');

        // Get user_id from session
        $userId = session()->get('user_id');

        // Create instance of WishlistModel (adjust as per your actual model)
        $wishlistModel = new WishlistModel();

        // Check if the book is already in the wishlist
        if ($wishlistModel->where('user_id', $userId)->where('book_id', $bookId)->countAllResults() > 0) {
            return redirect()->back()->with('error', 'This book is already in your wishlist.');
        }

        // Prepare data to insert into wishlist
        $data = [
            'user_id' => $userId,
            'book_id' => $bookId,
            // Add any additional fields you may have in your wishlist table
        ];

        // Insert data into wishlist
        if ($wishlistModel->insert($data)) {
            return redirect()->back()->with('success', 'Book added to wishlist successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to add book to wishlist. Please try again.');
        }
    }

    public function view()
    {
        $userId = session()->get('user_id');

        

        $wishlist = $this->wishlistModel->getUserWishlist($userId);

        return view('ProjectViews/wishlist/index', [
            'wishlist' => $wishlist
        ]);
    }
}

<?php

namespace App\Controllers\ProjectControllers;

use App\Models\ProjectModel\CartModel;
use App\Models\ProjectModel\BookModel;
use CodeIgniter\Controller;

class CartController extends Controller
{
    public function index()
    {
        // Load the CartModel
        $cartModel = new CartModel();

        // Load the BookModel
        $bookModel = new BookModel();

        // Fetch all items from the cart with book details
        $cartItems = $cartModel->getCartItemsWithDetails();

        // Prepare data to pass to the view
        $data['cartItems'] = $cartItems;

        // Load the cart view
        echo view('ProjectViews/cart/index', $data); // Assuming your cart view is named cart.php
    }

    public function addToCart()
    {
        // Handle adding items to the cart
        $bookId = $this->request->getPost('book_id');

        // Example logic (you should implement this based on your requirements)
        $cartModel = new CartModel();
        $cartModel->addToCart($bookId);

        // Redirect back to the previous page or wherever appropriate
        return redirect()->back()->with('success', 'Book added to cart successfully.');
    }

    public function removeFromCart()
    {
        // Handle removing items from the cart
        $cartId = $this->request->getPost('cart_id');

        // Example logic (you should implement this based on your requirements)
        $cartModel = new CartModel();
        $cartModel->removeFromCart($cartId);

        // Redirect back to the cart page or wherever appropriate
        return redirect()->back()->with('success', 'Item removed from cart successfully.');
    }
}

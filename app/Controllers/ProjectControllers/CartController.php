<?php

namespace App\Controllers\ProjectControllers;

use App\Models\ProjectModel\CartModel;
use App\Models\ProjectModel\BookModel;
use CodeIgniter\Controller;

class CartController extends Controller
{
    public function index()
    {
        // Check if user is logged in
    if (!session()->has('user')) {
        return redirect()->to(site_url('project/login'))->with('error', 'Please login to access the dashboard.');
    }
        // Load the CartModel
        $cartModel = new CartModel();

        // Load the BookModel
        $bookModel = new BookModel();

        // Fetch all items from the cart with book details
        $cartItems = $cartModel->getCartItemsWithDetails();

        // Prepare data to pass to the view
        $data['cartItems'] = $cartItems;
        $data['css'] = [
            'assets/css/cart/main.css',
        ];

        // Load the cart view
        echo view('ProjectViews/cart/index', $data); // Assuming your cart view is named cart.php
    }

    public function addToCart()
    {
        // Check if user is logged in
    if (!session()->has('user')) {
        return redirect()->to(site_url('project/login'))->with('error', 'Please login to access the dashboard.');
    }
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
        // Check if user is logged in
    if (!session()->has('user')) {
        return redirect()->to(site_url('project/login'))->with('error', 'Please login to access the dashboard.');
    }
        // Handle removing items from the cart
        $cartId = $this->request->getPost('cart_id');

        // Example logic (you should implement this based on your requirements)
        $cartModel = new CartModel();
        $cartModel->removeFromCart($cartId);

        // Redirect back to the cart page or wherever appropriate
        return redirect()->back()->with('success', 'Item removed from cart successfully.');
    }

    public function buy()
    {
        // Check if user is logged in
    if (!session()->has('user')) {
        return redirect()->to(site_url('project/login'))->with('error', 'Please login to access the dashboard.');
    }
        // Redirect to the payment page
        return view('ProjectViews/cart/cart_payment');
    }

    public function processPayment()
    {
        // Simulate processing of payment (replace with actual payment gateway integration)
        // For demonstration, assume payment was successful
        
        // You would typically have logic here to interact with a payment gateway
        
        // Redirect to the success page after payment
        return view('ProjectViews/cart/cart_success');
    }
}

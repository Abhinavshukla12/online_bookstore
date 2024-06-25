<?php

namespace App\Controllers\ProjectControllers;

use App\Controllers\BaseController;
use App\Models\ProjectModel\OrderModel;
use App\Models\ProjectModel\BookModel;
use Stripe\Stripe;
use Stripe\Charge;

class OrderController extends BaseController
{
    public function payment($book_id)
    {
        // Load the view for the payment page
        return view('ProjectViews/orders/payment', ['book_id' => $book_id]);
    }
    // Other methods...

    public function process_payment()
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return redirect()->to(site_url('project/login'))->with('error', 'Please login to make a payment.');
        }

        Stripe::setApiKey($_ENV['STRIPE_SECRET_KEY']);

        $token = $_POST['stripeToken'];
        $book_id = $_POST['book_id'];

        $bookModel = new BookModel();
        $orderModel = new OrderModel();

        $book = $bookModel->find($book_id);
        if (!$book) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Book not found');
        }

        $user_id = session()->get('user')['id'];
        $quantity = 1;
        $total_price = $book['price'] * $quantity;

        try {
            $charge = Charge::create([
                'amount' => $total_price * 100, // Amount in cents
                'currency' => 'usd',
                'source' => $token,
                'description' => 'Purchase of ' . $book['title'],
            ]);

            // Payment successful, create order
            $orderData = [
                'book_id' => $book_id,
                'user_id' => $user_id,
                'quantity' => $quantity,
                'total_price' => $total_price,
            ];

            $orderModel->insert($orderData);

            return redirect()->to(site_url('project/orders'))->with('success', 'Payment successful');
        } catch (\Stripe\Exception\CardException $e) {
            // Card was declined
            return redirect()->back()->with('error', 'Card was declined.');
        } catch (\Exception $e) {
            // Other error occurred
            return redirect()->back()->with('error', 'An error occurred. Please try again later.');
        }
    }
}

<?php

namespace App\Controllers\ProjectControllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return redirect()->to(site_url('project/login'))->with('error', 'Please login to access the dashboard.');
        }

        return view('ProjectViews/dashboard/index',);
    }
}
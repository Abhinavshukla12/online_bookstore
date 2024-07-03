<?php

namespace App\Controllers\ProjectControllers;

use App\Controllers\BaseController;

use App\Models\ProjectModel\AboutModel;

class AboutController extends BaseController
{
    public function index()
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return redirect()->to(site_url('project/login'))->with('error', 'Please login to access the dashboard.');
        }

        $aboutModel = new AboutModel();

        $data = [
            'pageTitle' => 'About Us',
            'mission' => $aboutModel->getAboutSection('mission'),
            'vision' => $aboutModel->getAboutSection('vision'),
            'history' => $aboutModel->getAboutSection('history'),
            'team' => $aboutModel->getAboutSection('team'),
            'contact' => $aboutModel->getAboutSection('contact'),
        ];

        $data['css']= [
            'assets/css/about/main.css',
        ];

        return view('ProjectViews/about/index', $data);
    }
}
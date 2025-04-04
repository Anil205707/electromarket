<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();

        // Fetch latest 3 products from database
        $featuredProducts = $productModel->orderBy('created_at', 'DESC')->limit(3)->findAll();

        // Pass data to the home view
        return view('home', ['featured' => $featuredProducts]);
    }
    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

}

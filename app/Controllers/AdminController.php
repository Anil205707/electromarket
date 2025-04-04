<?php namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\UserModel;

class AdminController extends BaseController
{
    public function index()
{
    $user = session()->get('user');
    if (!$user || $user['is_admin'] != 1) {
        return redirect()->to('/');
    }

    $productModel = new ProductModel();
    $userModel = new UserModel();

    $data['products'] = $productModel->findAll();
    $data['users'] = $userModel->findAll();

    // Pass counts for the chart
    $data['productCount'] = $productModel->countAll();
    $data['userCount'] = $userModel->countAll();

    return view('admin/dashboard', $data);
}

}

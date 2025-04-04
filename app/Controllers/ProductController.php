<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ProductController extends BaseController
{
    // Display paginated products
    public function index()
    {
        $productModel = new ProductModel();
        $perPage = 9;

        $products = $productModel->paginate($perPage, 'products');

        return view('products/index', [
            'products' => $products,
            'pager'    => $productModel->pager
        ]);
    }

    // AJAX Pagination view
    public function paginateAjax($page = 1)
    {
        $productModel = new ProductModel();
        $perPage = 9;

        $products = $productModel->paginate($perPage, 'products', $page);

        return view('products/product_cards', [
            'products' => $products,
            'pager'    => $productModel->pager
        ]);
    }

    // Show create form
    public function create()
    {
        return view('products/create');
    }

    // Store new product
    public function store()
    {
        $imageFile = $this->request->getFile('image');
        $imageName = '';

        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads/', $imageName);
        }

        $model = new ProductModel();
        $model->save([
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'image'       => $imageName,
            'location'    => $this->request->getPost('location'),
        ]);

        return redirect()->to('/products');
    }

    // Show edit form
    public function edit($id)
    {
        $model = new ProductModel();
        $product = $model->find($id);

        if (!$product) {
            throw PageNotFoundException::forPageNotFound("Product not found");
        }

        return view('products/edit', ['product' => $product]);
    }

    // Update product
    public function update($id)
    {
        $model = new ProductModel();
        $product = $model->find($id);

        if (!$product) {
            throw PageNotFoundException::forPageNotFound("Product not found");
        }

        $imageName = $product['image'];
        $imageFile = $this->request->getFile('image');

        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads/', $imageName);
        }

        $model->update($id, [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'image'       => $imageName,
            'location'    => $this->request->getPost('location'),
        ]);

        return redirect()->to('/admin');
    }

    // Delete product
    public function delete($id)
    {
        $model = new ProductModel();
        $model->delete($id);

        return redirect()->to('/admin');
    }

    // Show single product
    public function show($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($id);

        if (!$product) {
            throw PageNotFoundException::forPageNotFound("Product not found");
        }

        return view('product_detail', ['product' => $product]);
    }

    // AJAX search
    public function search()
{
    $query = $this->request->getGet('query');

    $model = new \App\Models\ProductModel();
    $results = $model
        ->like('name', $query)
        ->select('id, name')
        ->findAll(5); // Limit results for suggestions

    return $this->response->setJSON($results); // ✅ Return JSON
}

    public function liveSearch()
    {
        $query = $this->request->getGet('query');
        $productModel = new \App\Models\ProductModel();

        $products = $productModel
            ->like('name', $query)
            ->paginate(9, 'products');

        $pager = $productModel->pager;

        return view('products/product_cards', [
            'products' => $products,
            'pager' => $pager
        ]);
    }

    public function filter()
    {
        $query = $this->request->getGet('query');
        $productModel = new ProductModel();

        $products = $productModel->like('name', $query)->findAll();

        return view('products/product_cards', [
            'products' => $products,
            'pager'    => null // no pagination when filtering
        ]);
    }

    


}

<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class Cart extends Controller
{
    public function add($productId)
{
    $session = session();
    $productModel = new \App\Models\ProductModel();
    $product = $productModel->find($productId);

    if ($product) {
        $cart = $session->get('cart') ?? [];
        $cart[$productId] = ($cart[$productId] ?? 0) + 1;
        $session->set('cart', $cart);
    }

    return redirect()->to('/cart/view');
}


    public function view()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        $productModel = new ProductModel();
        $products = [];

        foreach ($cart as $productId => $qty) {
            $product = $productModel->find($productId);
            if ($product) {
                $product['qty'] = $qty;
                $products[] = $product;
            }
        }

        return view('cart_view', ['cart_products' => $products]);
    }

    public function increase($productId)
    {
        $session = session();
        $cart = $session->get('cart') ?? [];
        if (isset($cart[$productId])) {
            $cart[$productId]++;
            $session->set('cart', $cart);
        }
        return redirect()->to('/cart/view');
    }

    public function decrease($productId)
    {
        $session = session();
        $cart = $session->get('cart') ?? [];
        if (isset($cart[$productId])) {
            if ($cart[$productId] > 1) {
                $cart[$productId]--;
            } else {
                unset($cart[$productId]);
            }
            $session->set('cart', $cart);
        }
        return redirect()->to('/cart/view');
    }

    public function remove($productId)
    {
        $session = session();
        $cart = $session->get('cart') ?? [];
        unset($cart[$productId]);
        $session->set('cart', $cart);
        return redirect()->to('/cart/view');
    }

}

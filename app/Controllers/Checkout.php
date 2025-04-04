<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class Checkout extends Controller
{
    public function index()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        if (empty($cart)) {
            return redirect()->to('/cart/view');
        }

        // Calculate total
        $productModel = new ProductModel();
        $grandTotal = 0;

        foreach ($cart as $id => $qty) {
            $product = $productModel->find($id);
            if ($product) {
                $grandTotal += $qty * $product['price'];
            }
        }

        return view('checkout_form', ['grandTotal' => $grandTotal]);
    }

    public function placeOrder()
        {
            $session = session();
            $cart = $session->get('cart') ?? [];

            if (empty($cart)) return redirect()->to('/cart/view');

            $orderModel = new \App\Models\OrderModel();
            $orderData = [
                'user_name' => $this->request->getPost('name'),
                'address'   => $this->request->getPost('address'),
                'total_amount' => $this->request->getPost('total')
            ];

            $orderId = $orderModel->saveOrder($orderData, $cart);

            // (Optional) Send Email Receipt — covered next
            $session->remove('cart');
            return view('order_success', ['orderId' => $orderId]);
        }

}

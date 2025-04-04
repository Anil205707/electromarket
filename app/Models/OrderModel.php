<?php

namespace App\Models;
use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $allowedFields = ['user_name', 'address', 'total_amount'];

    public function saveOrder($data, $cart)
    {
        $this->insert($data);
        $orderId = $this->getInsertID();

        $db = \Config\Database::connect();
        foreach ($cart as $productId => $qty) {
            $db->table('order_items')->insert([
                'order_id' => $orderId,
                'product_id' => $productId,
                'quantity' => $qty
            ]);
        }

        return $orderId;
    }
}

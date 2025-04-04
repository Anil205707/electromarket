<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="card shadow p-4 rounded-4">
        <h2 class="mb-4"><i class="bi bi-cart-check-fill"></i> Your Cart</h2>

        <?php if (!empty($cart_products)) : ?>
            <div class="table-responsive">
                <table class="table table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        <?php $grandTotal = 0; ?>
                        <?php foreach ($cart_products as $item): ?>
                            <?php $total = $item['qty'] * $item['price']; ?>
                            <tr>
                                <td class="fw-semibold"><?= esc($item['name']) ?></td>

                                <td>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <a href="<?= base_url('cart/decrease/' . $item['id']) ?>" class="btn btn-sm btn-outline-secondary">−</a>
                                        <?= esc($item['qty']) ?>
                                        <a href="<?= base_url('cart/increase/' . $item['id']) ?>" class="btn btn-sm btn-outline-primary">+</a>
                                    </div>
                                </td>

                                <td>$<?= number_format($item['price'], 2) ?></td>
                                <td class="text-success fw-bold">$<?= number_format($total, 2) ?></td>

                                <td>
                                    <a href="<?= base_url('cart/remove/' . $item['id']) ?>" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $grandTotal += $total; ?>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <h4 class="text-primary">Total: $<?= number_format($grandTotal, 2) ?></h4>
                <a href="<?= base_url('checkout') ?>" class="btn btn-success btn-lg">Proceed to Checkout</a>
            </div>
        <?php else : ?>
            <p class="text-muted">Your cart is empty. Start shopping!</p>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="card shadow p-4 rounded-4">
        <h2 class="mb-4"><i class="bi bi-credit-card"></i> Checkout</h2>

        <form action="<?= base_url('checkout/placeOrder') ?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" name="name" id="name" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Delivery Address</label>
                <textarea name="address" id="address" rows="3" required class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Total Amount</label>
                <div class="text-success fs-4">$<?= number_format($grandTotal, 2) ?></div>
                <input type="hidden" name="total" value="<?= $grandTotal ?>">
            </div>

            <button type="submit" class="btn btn-success btn-lg">Place Order</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>

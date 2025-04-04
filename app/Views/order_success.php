<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="alert alert-success shadow rounded-4 p-4 text-center">
        <h2 class="mb-3"><i class="bi bi-check-circle-fill"></i> Order Placed Successfully!</h2>
        <p>Thank you for shopping with <strong>ElectroMarket</strong>. Your order is on its way. 🚚</p>
        <a href="<?= base_url('products') ?>" class="btn btn-primary mt-3">Continue Shopping</a>
    </div>
</div>

<?= $this->endSection() ?>

<!DOCTYPE html>
<html>
<head>
<?= view('layout/header') ?>

<!-- Hero Section with Background -->
<section class="text-white text-center py-5" style="background: linear-gradient(to right, #0f2027, #203a43, #2c5364);">
  <div class="container">
    <h1 class="display-3 fw-bold mb-3">Welcome to <span class="text-warning">ElectroMarket</span></h1>
    <p class="lead mb-4">Buy and Sell Second-Hand Electronics Safely & Easily</p>
    <div class="d-flex justify-content-center gap-3">
      <a href="<?= base_url('products') ?>" class="btn btn-warning btn-lg shadow px-4 py-2">Browse Products</a>
      <a href="<?= base_url('products/create') ?>" class="btn btn-outline-light btn-lg shadow px-4 py-2">Sell Your Device</a>
    </div>
  </div>
</section>

<!-- Features Section with Matching Background -->
<section class="py-5 text-white" style="background: linear-gradient(to right, #0f2027, #203a43, #2c5364);">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Why Choose <span class="text-warning">ElectroMarket?</span></h2>
      <p class="text-light">Trusted by thousands of buyers and sellers across the globe.</p>
    </div>
    <div class="row text-center g-4">
      <div class="col-md-4">
        <div class="p-4 bg-dark rounded-4 shadow h-100 border border-secondary">
          <i class="bi bi-shield-lock-fill fs-1 text-warning mb-3"></i>
          <h5 class="fw-bold text-white">Secure Transactions</h5>
          <p class="text-light">Buy and sell confidently with top-level data encryption and fraud protection.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 bg-dark rounded-4 shadow h-100 border border-secondary">
          <i class="bi bi-phone-fill fs-1 text-success mb-3"></i>
          <h5 class="fw-bold text-white">Top Electronics</h5>
          <p class="text-light">Amazing deals on phones, laptops, cameras, gaming consoles, and more.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 bg-dark rounded-4 shadow h-100 border border-secondary">
          <i class="bi bi-geo-alt-fill fs-1 text-danger mb-3"></i>
          <h5 class="fw-bold text-white">Smart Location Offers</h5>
          <p class="text-light">Discover listings close to you with our advanced geo-matching engine.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Featured Products Section with Matching Background -->
<section class="py-5 text-white" style="background: linear-gradient(to right, #0f2027, #203a43, #2c5364);">
  <div class="container">
    <h2 class="text-center fw-bold mb-5 text-warning">🔥 Trending Now</h2>
    <div class="row g-4">
      <?php if (!empty($featured)) : ?>
        <?php foreach ($featured as $product): ?>
          <div class="col-md-4">
            <div class="card border-0 shadow-lg rounded-4 h-100 bg-dark text-white">
              <img src="<?= base_url('uploads/' . $product['image']) ?>" class="card-img-top rounded-top-4" alt="<?= esc($product['name']) ?>">
              <div class="card-body">
                <h5 class="card-title fw-bold text-white text-truncate"><?= esc($product['name']) ?></h5>
                <p class="text-warning mb-2">$<?= esc($product['price']) ?></p>
                <a href="<?= base_url('product/' . $product['id']) ?>" class="btn btn-sm btn-outline-light rounded-pill">View Product</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="text-center text-white">No products available yet.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- CTA Banner with Overlay -->
<section class="py-5 position-relative" style="background: url('<?= base_url('assets/images/elec.jpg') ?>') center/cover no-repeat;">
  <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-75"></div>
  <div class="container position-relative text-center text-white">
    <h2 class="display-5 fw-bold mb-2">Got Tech to Sell?</h2>
    <p class="lead fw-semibold">Post your used electronics and earn cash quickly.</p>
    <a href="<?= base_url('products/create') ?>" class="btn btn-lg btn-warning text-dark fw-bold px-4 py-2 mt-3 rounded-pill">Post an Ad</a>
  </div>
</section>

<?= view('layout/footer') ?>
</html>

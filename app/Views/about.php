<?= view('layout/header') ?>

<!-- About Page Section with Gradient Background -->
<section class="py-5 text-white" style="background: linear-gradient(to right, #0f2027, #203a43, #2c5364);">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-warning">📱 About <span class="text-white">ElectroMarket</span></h2>
      <p class="lead text-light">Connecting buyers and sellers of second-hand electronics — safely, locally, and smartly.</p>
    </div>

    <div class="row align-items-center">
      <div class="col-md-6 mb-4 mb-md-0">
        <img src="<?= base_url('assets/images/elec.png.webp') ?>" class="img-fluid rounded shadow-lg border border-light" alt="About ElectroMarket">
      </div>
      <div class="col-md-6">
        <h4 class="fw-semibold text-white mb-3">Why Choose ElectroMarket?</h4>
        <ul class="list-unstyled">
          <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Safe and Verified User Platform</li>
          <li class="mb-2"><i class="bi bi-geo-alt-fill text-danger me-2"></i> Location-Based Listings</li>
          <li class="mb-2"><i class="bi bi-currency-dollar text-warning me-2"></i> Easy Payments & Best Deals</li>
          <li class="mb-2"><i class="bi bi-device-ssd-fill text-info me-2"></i> Wide Range of Electronics: Phones, Laptops, Accessories</li>
          <li class="mb-2"><i class="bi bi-globe text-primary me-2"></i> Serving users across Nepal and beyond</li>
        </ul>
      </div>
    </div>

    <div class="mt-5">
      <h5 class="fw-bold text-warning">🌍 Our Mission</h5>
      <p class="text-light">
        To create a trusted online marketplace for second-hand electronics, empowering users to buy and sell conveniently with confidence and clarity.
      </p>

      <h5 class="fw-bold text-warning">💡 Our Vision</h5>
      <p class="text-light">
        Building a greener, smarter tech economy through sustainable trade and inclusive technology reuse.
      </p>
    </div>
  </div>
</section>

<?= view('layout/footer') ?>

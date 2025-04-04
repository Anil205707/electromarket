<?= view('layout/header') ?>

<!-- Contact Us Page with Gradient Background -->
<section class="py-5 text-white" style="background: linear-gradient(to right, #0f2027, #203a43, #2c5364);">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-warning">📞 Contact <span class="text-white">Us</span></h2>
      <p class="lead text-light">Have questions, suggestions, or issues? We're here to help you.</p>
    </div>

    <div class="row align-items-center">
      <div class="col-md-6 mb-4 mb-md-0">
        <img src="<?= base_url('assets/images/elec.jpg') ?>" class="img-fluid rounded shadow-lg border border-light" alt="Contact Us">
      </div>
      <div class="col-md-6">
        <h4 class="fw-semibold text-white mb-4">Get in Touch</h4>
        <ul class="list-unstyled fs-5">
          <li class="mb-3">
            <i class="bi bi-envelope-fill text-danger me-2"></i>
            <strong>Email:</strong> support@electromarket.com
          </li>
          <li class="mb-3">
            <i class="bi bi-telephone-fill text-success me-2"></i>
            <strong>Phone:</strong> +977-9800000000
          </li>
          <li class="mb-3">
            <i class="bi bi-geo-alt-fill text-primary me-2"></i>
            <strong>Location:</strong> Kathmandu, Nepal
          </li>
        </ul>
      </div>
    </div>

    <div class="mt-5">
      <h5 class="fw-bold text-warning">🗨️ Need More Help?</h5>
      <p class="text-light">You can also reach out through social media or fill out our feedback form. We aim to respond within 24 hours.</p>
    </div>
  </div>
</section>

<?= view('layout/footer') ?>

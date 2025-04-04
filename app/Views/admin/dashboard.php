<?= view('layout/header') ?>

<!-- Admin Dashboard Section with Gradient Background -->
<section class="py-5 text-white" style="background: linear-gradient(to right, #0f2027, #203a43, #2c5364);">
  <div class="container">
    <h2 class="mb-4 fw-bold text-warning">👨‍💼 Admin Dashboard</h2>

    <!-- Overview Summary Cards -->
    <div class="row text-white">
      <div class="col-md-4 mb-3">
        <div class="card bg-primary shadow">
          <div class="card-body">
            <h5 class="card-title">📦 Total Products</h5>
            <h3><?= count($products) ?></h3>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card bg-success shadow">
          <div class="card-body">
            <h5 class="card-title">👥 Total Users</h5>
            <h3><?= count($users) ?></h3>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card bg-warning shadow">
          <div class="card-body">
            <h5 class="card-title">🛡️ Admins</h5>
            <h3><?= count(array_filter($users, fn($u) => $u['is_admin'])) ?></h3>
          </div>
        </div>
      </div>
    </div>

    <!-- Chart Section -->
    <div class="card my-4 shadow border-0 bg-dark text-white">
      <div class="card-body">
        <h4 class="card-title text-warning">📊 User vs Product Overview</h4>
        <canvas id="overviewChart" height="100"></canvas>
      </div>
    </div>

    <!-- All Products Table -->
    <div class="card mb-4 shadow border-0 bg-dark text-white">
      <div class="card-body">
        <h4 class="card-title text-warning">🛒 All Products</h4>
        <div class="table-responsive">
          <table class="table table-bordered table-striped align-middle table-dark">
            <thead>
              <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($products as $product): ?>
              <tr>
                <td><?= esc($product['name']) ?></td>
                <td>$<?= esc($product['price']) ?></td>
                <td>
                  <?php if ($product['image']): ?>
                    <img src="<?= base_url('uploads/' . $product['image']) ?>" width="60">
                  <?php endif; ?>
                </td>
                <td>
                  <a href="<?= base_url('products/edit/' . $product['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="<?= base_url('products/delete/' . $product['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- All Users Table -->
    <div class="card mb-4 shadow border-0 bg-dark text-white">
      <div class="card-body">
        <h4 class="card-title text-warning">👤 All Users</h4>
        <div class="table-responsive">
          <table class="table table-bordered table-striped align-middle table-dark">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Admin?</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $user): ?>
              <tr>
                <td><?= esc($user['name']) ?></td>
                <td><?= esc($user['email']) ?></td>
                <td>
                  <span class="badge bg-<?= $user['is_admin'] ? 'success' : 'secondary' ?>">
                    <?= $user['is_admin'] ? 'Yes' : 'No' ?>
                  </span>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('overviewChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Users', 'Admins', 'Products'],
      datasets: [{
        label: 'Total Count',
        data: [
          <?= count($users) ?>,
          <?= count(array_filter($users, fn($u) => $u['is_admin'])) ?>,
          <?= count($products) ?>
        ],
        backgroundColor: ['#198754', '#ffc107', '#0d6efd']
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false }
      },
      scales: {
        y: { beginAtZero: true }
      }
    }
  });
</script>

<?= view('layout/footer') ?>

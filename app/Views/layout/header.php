<!-- ===== HEADER WITH GLOBAL SEARCH (header.php) ===== -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ElectroMarket</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      padding-top: 70px;
    }
    #suggestions {
      max-height: 200px;
      overflow-y: auto;
      width: 300px;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="<?= base_url() ?>">
      Electro<span class="text-primary">Market</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
      aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-2">
        
        <li class="nav-item"><a class="nav-link" href="<?= base_url('products') ?>">Products</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('products/create') ?>">Add Product</a></li>
      </ul>

      <!-- Search Bar -->
      <form class="d-flex position-relative me-3" role="search" autocomplete="off">
        <input class="form-control" id="searchInput" type="search" placeholder="Search products...">
        <button class="btn btn-outline-light" type="button"><i class="bi bi-search"></i></button>
        <ul id="suggestions" class="list-group position-absolute top-100 z-3 mt-1 w-100"></ul>
      </form>

      <!-- Auth Buttons -->
      <ul class="navbar-nav mb-2 mb-lg-0 gap-2">
        <?php if (session()->get('user')): ?>
          <?php $user = session()->get('user'); ?>
          <li class="nav-item"><span class="nav-link text-white">Hi, <?= esc($user['name']) ?></span></li>
          <li class="nav-item"><a class="btn btn-outline-danger btn-sm" href="<?= base_url('logout') ?>">Logout</a></li>
          <?php if (!empty($user['is_admin'])): ?>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/dashboard') ?>">Admin Dashboard</a></li>
          <?php endif; ?>
        <?php else: ?>
          <li class="nav-item"><a class="btn btn-outline-success btn-sm" href="<?= base_url('login') ?>">Login</a></li>
          <li class="nav-item"><a class="btn btn-success btn-sm" href="<?= base_url('register') ?>">Register</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Collapse navbar on mobile after link click -->
<script>
document.addEventListener("DOMContentLoaded", function () {
  const navbarCollapse = document.getElementById('mainNavbar');
  const navLinks = navbarCollapse.querySelectorAll('.nav-link');
  navLinks.forEach(link => {
    link.addEventListener('click', () => {
      if (window.innerWidth < 992 && navbarCollapse.classList.contains('show')) {
        const bsCollapse = new bootstrap.Collapse(navbarCollapse, { toggle: false });
        bsCollapse.hide();
      }
    });
  });
});
</script>

<!-- Global Search Logic -->
<script>
document.addEventListener("DOMContentLoaded", function () {
  const input = document.getElementById('searchInput');
  const suggestions = document.getElementById('suggestions');
  if (!input || !suggestions) return;

  let debounceTimer;

  input.addEventListener('input', function () {
    const query = this.value.trim();
    clearTimeout(debounceTimer);

    debounceTimer = setTimeout(() => {
      if (query.length < 1) {
        suggestions.innerHTML = '';
        return;
      }

      fetch('<?= base_url('products/search?query=') ?>' + encodeURIComponent(query))
        .then(res => res.json())
        .then(data => {
          suggestions.innerHTML = '';
          if (data.length === 0) {
            const li = document.createElement('li');
            li.textContent = 'No products found';
            li.className = 'list-group-item text-muted';
            suggestions.appendChild(li);
          } else {
            data.forEach(product => {
              const li = document.createElement('li');
              li.textContent = product.name;
              li.classList.add('list-group-item');
              li.addEventListener('click', () => {
                input.value = product.name;
                suggestions.innerHTML = '';
                // ✅ Go directly to product detail page
                window.location.href = '<?= base_url('product') ?>/' + product.id;
              });
              suggestions.appendChild(li);
            });
          }
        });
    }, 300);
  });

  document.addEventListener('click', function (e) {
    if (!suggestions.contains(e.target) && e.target !== input) {
      suggestions.innerHTML = '';
    }
  });
});
</script>

<?= view('layout/header') ?>

<!-- Stylish Products Section -->
<section class="py-5 text-white" style="background: linear-gradient(to right, #0f2027, #203a43, #2c5364);">
  <div class="container">
    <!-- Header and Currency -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
      <h2 class="fw-bold text-warning">🛍️ All Products</h2>
      <div class="d-flex align-items-center">
        <label for="currency" class="form-label me-2 fw-semibold text-white">💱 Currency</label>
        <select id="currency" class="form-select w-auto">
          <option value="USD">USD</option>
          <option value="EUR">EUR</option>
          <option value="INR">INR</option>
        </select>
      </div>
    </div>

    

    <!-- AJAX-updated Product Section -->
    <div id="productContainer">
      <?= view('products/product_cards', ['products' => $products, 'pager' => $pager]) ?>
    </div>
  </div>
</section>

<!-- Scripts -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const currencySelect = document.getElementById('currency');
    const input = document.getElementById('searchInput');
    const suggestions = document.getElementById('suggestions');
    let debounceTimer;

    // Restore saved currency from localStorage
    const savedCurrency = localStorage.getItem('selectedCurrency');
    if (savedCurrency) {
        currencySelect.value = savedCurrency;
        currencySelect.dispatchEvent(new Event('change'));
    }

    currencySelect.addEventListener('change', function () {
        const selected = this.value;
        localStorage.setItem('selectedCurrency', selected);

        fetch('https://api.exchangerate-api.com/v4/latest/USD')
            .then(res => res.json())
            .then(data => {
                const rate = data.rates[selected];
                if (!rate) throw new Error("Rate not found");

                document.querySelectorAll('[data-price]').forEach(el => {
                    const usd = parseFloat(el.getAttribute('data-price'));
                    const converted = (usd * rate).toFixed(2);
                    el.textContent = `${selected} ${converted}`;
                });
            })
            .catch(err => {
                console.error("Currency conversion error:", err);
                alert("Currency conversion failed. Prices shown in USD.");
                currencySelect.value = "USD";
            });
    });

    document.addEventListener("click", function (e) {
        const link = e.target.closest(".pagination a");
        if (link) {
            e.preventDefault();
            fetch(link.href)
                .then(res => res.text())
                .then(html => {
                    const temp = document.createElement('div');
                    temp.innerHTML = html;
                    const newContent = temp.querySelector('#productContainer');
                    if (newContent) {
                        document.querySelector("#productContainer").innerHTML = newContent.innerHTML;
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                        currencySelect.dispatchEvent(new Event('change'));
                        document.querySelectorAll(".buy-now").forEach(button => {
                            button.addEventListener("click", () => alert("Buy Now clicked!"));
                        });
                    }
                })
                .catch(err => console.error("AJAX Pagination error:", err));
        }
    });

    input.addEventListener('input', function () {
        const query = this.value.trim();
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            if (query.length < 1) {
                suggestions.innerHTML = '';
                fetch(`<?= base_url('products') ?>`)
                    .then(res => res.text())
                    .then(html => {
                        const temp = document.createElement('div');
                        temp.innerHTML = html;
                        const newContent = temp.querySelector('#productContainer');
                        if (newContent) {
                            document.querySelector("#productContainer").innerHTML = newContent.innerHTML;
                            currencySelect.dispatchEvent(new Event('change'));
                        }
                    });
                return;
            }
            fetch(`<?= base_url('products/search?query=') ?>` + encodeURIComponent(query))
                .then(res => res.json())
                .then(data => {
                    suggestions.innerHTML = '';
                    data.forEach(product => {
                        const li = document.createElement('li');
                        li.textContent = product.name;
                        li.classList.add('list-group-item');
                        li.addEventListener('click', () => {
                            input.value = product.name;
                            suggestions.innerHTML = '';
                            liveFilter(product.name);
                        });
                        suggestions.appendChild(li);
                    });
                });

            fetch(`<?= base_url('products/filter?query=') ?>` + encodeURIComponent(query))
                .then(res => res.text())
                .then(html => {
                    document.querySelector("#productContainer").innerHTML = html;
                    currencySelect.dispatchEvent(new Event('change'));
                });
        }, 300);
    });

    function liveFilter(query) {
        document.querySelectorAll('.product-card').forEach(card => {
            const title = card.querySelector('h5').textContent.toLowerCase();
            card.style.display = title.includes(query.toLowerCase()) ? '' : 'none';
        });
    }
});
</script>

<?= view('layout/footer') ?>

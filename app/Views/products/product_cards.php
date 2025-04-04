<div class="row">
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4 product-card"> 
            <div class="card shadow-sm border-0 h-100 d-flex flex-column">

                    
                    <!-- Product Image inside ratio container -->
                    <div class="ratio ratio-4x3">
                        <img src="<?= base_url('uploads/' . $product['image']) ?>"
                             class="img-fluid rounded-top"
                             alt="Product Image"
                             style="object-fit: cover; width: 100%; height: 100%;">
                    </div>
                    
                    <!-- Product Body -->
                    <div class="card-body d-flex flex-column">

                        
                        <!-- Name & Description -->
                        <h5 class="card-title fw-semibold"><?= esc($product['name']) ?></h5>
                        <p class="card-text text-muted small"><?= esc($product['description']) ?></p>
                        
                        <!-- Price -->
                        <strong class="text-primary fs-5 mb-2" data-price="<?= esc($product['price']) ?>">
                            INR <?= number_format($product['price'], 2) ?>
                        </strong>

                        <!-- Location -->
                        <p class="mb-1"><i class="bi bi-geo-alt"></i> <?= esc($product['location']) ?></p>

                        <!-- Posted By -->
                        <p class="mb-1 text-muted small">
                            <i class="bi bi-person-circle"></i> Posted by: <?= esc($product['posted_by']) ?>
                        </p>

                        <!-- Contact Info -->
                        <p class="mb-1 text-muted small">
                            <i class="bi bi-telephone"></i> <?= esc($product['contact_phone']) ?><br>
                            <i class="bi bi-envelope"></i> <?= esc($product['contact_email']) ?>
                        </p>

                    
                        
                    <div class="mt-auto">
                        <a href="<?= base_url('product/' . $product['id']) ?>" class="btn btn-primary w-100 mb-2">
                            View Product
                        </a>
                        <a href="<?= base_url('cart/add/' . $product['id']) ?>" class="btn btn-success w-100">
                            <i class="bi bi-cart-plus"></i> Buy Now
                        </a>
                    </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center">
            <p class="text-muted">No products found.</p>
        </div>
    <?php endif; ?>
</div>

<!-- Pagination Links -->
<?php if (!empty($pager)) : ?>
    <div class="d-flex justify-content-center mt-4">
        <?= $pager->links('products', 'bootstrap') ?>
    </div>
<?php endif; ?>

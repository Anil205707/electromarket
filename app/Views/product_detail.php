<?= view('layout/header') ?>

<div class="container my-5">
    <div class="card mx-auto" style="max-width: 600px;">
        
        <!-- Product Image -->
        <img src="<?= base_url('uploads/' . $product['image']) ?>" class="card-img-top" alt="<?= esc($product['name']) ?>" style="object-fit: cover; max-height: 400px;">

        <div class="card-body">
            <!-- Product Name -->
            <h3 class="card-title"><?= esc($product['name']) ?></h3>

            <!-- Price -->
            <p class="card-text"><strong>Price:</strong> $<?= esc($product['price']) ?></p>

            <!-- Description -->
            <p class="card-text"><strong>Description:</strong> <?= esc($product['description']) ?></p>

            <!-- Location -->
            <p class="card-text text-muted"><i class="bi bi-geo-alt"></i> <strong>Location:</strong> <?= esc($product['location']) ?></p>

            <!-- Posted By -->
            <p class="card-text text-muted"><i class="bi bi-person-circle"></i> <strong>Posted By:</strong> <?= esc($product['posted_by']) ?></p>

            <!-- Contact Info -->
            <p class="card-text text-muted"><i class="bi bi-telephone"></i> <strong>Contact Phone:</strong> <?= esc($product['contact_phone']) ?></p>
            <p class="card-text text-muted"><i class="bi bi-envelope"></i> <strong>Contact Email:</strong> <?= esc($product['contact_email']) ?></p>

            <!-- Buy Now Button -->
            <a href="<?= base_url('cart/add/' . $product['id']) ?>" class="btn btn-success w-100 mt-3">
                <i class="bi bi-cart-plus"></i> Buy Now
            </a>
        </div>
    </div>
</div>

<?= view('layout/footer') ?>

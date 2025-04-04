<?= view('layout/header') ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-warning text-dark fw-bold">
                    <i class="bi bi-pencil-square me-2"></i> Edit Product
                </div>

                <div class="card-body">
                    <form method="post" action="<?= base_url('products/update/' . $product['id']) ?>" enctype="multipart/form-data">

                        <!-- Product Name -->
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="productName" value="<?= esc($product['name']) ?>" required>
                            <label for="productName">Product Name</label>
                        </div>

                        <!-- Description -->
                        <div class="form-floating mb-3">
                            <textarea name="description" class="form-control" id="productDesc" style="height: 120px"><?= esc($product['description']) ?></textarea>
                            <label for="productDesc">Description</label>
                        </div>

                        <!-- Price -->
                        <div class="form-floating mb-3">
                            <input type="number" step="0.01" name="price" class="form-control" id="productPrice" value="<?= esc($product['price']) ?>" required>
                            <label for="productPrice">Price ($)</label>
                        </div>

                        <!-- Location -->
                        <label class="form-label">Location</label>
                        <div class="input-group mb-3">
                            <input type="text" id="location" name="location" class="form-control" value="<?= esc($product['location']) ?>" placeholder="Auto-detected...">
                            <button type="button" onclick="getLocation()" class="btn btn-outline-secondary">Get Location</button>
                        </div>

                        <!-- Product Image -->
                        <label class="form-label">Change Image (optional)</label>
                        <input type="file" name="image" class="form-control mb-3" accept="image/*" capture="environment">
                        <?php if ($product['image']): ?>
                            <p>Current Image:</p>
                            <img src="<?= base_url('uploads/' . $product['image']) ?>" width="100" class="img-thumbnail mb-3">
                        <?php endif; ?>

                        <!-- Posted By -->
                        <div class="form-floating mb-3">
                            <input type="text" name="posted_by" class="form-control" id="postedBy" value="<?= esc($product['posted_by']) ?>" required>
                            <label for="postedBy">Posted By</label>
                        </div>

                        <!-- Contact Phone -->
                        <div class="form-floating mb-3">
                            <input type="text" name="contact_phone" class="form-control" id="contactPhone" value="<?= esc($product['contact_phone']) ?>" required>
                            <label for="contactPhone">Contact (Phone)</label>
                        </div>

                        <!-- Contact Email -->
                        <div class="form-floating mb-3">
                            <input type="email" name="contact_email" class="form-control" id="contactEmail" value="<?= esc($product['contact_email']) ?>" required>
                            <label for="contactEmail">Contact (Email)</label>
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="btn btn-warning w-100 fw-bold">
                            <i class="bi bi-save"></i> Update Product
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<?= view('layout/footer') ?>


<?= view('layout/header') ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Styled Form Card -->
            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white fw-bold">
                    <i class="bi bi-plus-circle me-2"></i> Add New Product
                </div>

                <div class="card-body">
                    <form method="post" action="<?= base_url('products/store') ?>" enctype="multipart/form-data">

                        <!-- Product Name -->
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="productName" placeholder="Product Name" required>
                            <label for="productName">Product Name</label>
                        </div>

                        <!-- Description -->
                        <div class="form-floating mb-3">
                            <textarea name="description" class="form-control" id="productDesc" placeholder="Description" style="height: 120px"></textarea>
                            <label for="productDesc">Description</label>
                        </div>

                        <!-- Price -->
                        <div class="form-floating mb-3">
                            <input type="number" step="0.01" name="price" class="form-control" id="productPrice" placeholder="Price" required>
                            <label for="productPrice">Price ($)</label>
                        </div>

                        <!-- Location -->
                        <label class="form-label">Location</label>
                        <div class="input-group mb-3">
                            <input type="text" id="location" name="location" class="form-control" placeholder="Auto-detected..." readonly>
                            <button type="button" onclick="getLocation()" class="btn btn-outline-secondary"> Get Location</button>
                        </div>

                        <!-- Product Image -->
                        <label class="form-label">Product Image</label>
                        <input type="file" name="image" class="form-control mb-4" accept="image/*" capture="environment">

                        <!-- Posted By -->
                        <div class="form-floating mb-3">
                            <input type="text" name="posted_by" class="form-control" id="postedBy" placeholder="Your Name" required>
                            <label for="postedBy">Posted By</label>
                        </div>

                        <!-- Contact Details -->
                        <div class="form-floating mb-3">
                            <input type="text" name="contact_info" class="form-control" id="contactInfo" placeholder="Phone or Email" required>
                            <label for="contactInfo">Contact(Phone)</label>
                        </div>

                        <!-- Contact Details -->
                        <div class="form-floating mb-3">
                            <input type="text" name="contact_info" class="form-control" id="contactInfo" placeholder="Phone or Email" required>
                            <label for="contactInfo">Contact(Email)</label>
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="btn btn-success w-100 fw-bold">
                            <i class="bi bi-cloud-upload"></i> Submit Product
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Geolocation Script -->
<script>
const OPENCAGE_KEY = 'YOUR_OPENCAGE_API_KEY'; // 👈 Replace this with your real key!

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(async function (position) {
      const lat = position.coords.latitude;
      const lon = position.coords.longitude;

      const url = `https://api.opencagedata.com/geocode/v1/json?q=${lat}+${lon}&key=${OPENCAGE_KEY}`;

      try {
        const response = await fetch(url);
        const data = await response.json();

        if (data.results.length > 0) {
          const address = data.results[0].formatted;
          document.getElementById('location').value = address;
        } else {
          document.getElementById('location').value = `Lat: ${lat.toFixed(4)}, Lon: ${lon.toFixed(4)}`;
        }
      } catch (error) {
        alert('Error getting address');
        document.getElementById('location').value = `Lat: ${lat.toFixed(4)}, Lon: ${lon.toFixed(4)}`;
      }

    }, function (error) {
      alert('Location access denied.');
    });
  } else {
    alert("Geolocation is not supported.");
  }
}
</script>

<?= view('layout/footer') ?>

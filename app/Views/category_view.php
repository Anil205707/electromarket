<h2>Categories</h2>

<form method="post" action="<?= site_url('category/add') ?>">
    <input type="text" name="name" placeholder="New Category" required>
    <button type="submit">Add</button>
</form>

<ul>
<?php foreach($categories as $cat): ?>
    <li><?= $cat->name ?></li>
<?php endforeach; ?>
</ul>

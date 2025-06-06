<?php $this->layout('master', ['title' => 'Add Product']) ?>

<main class="container mt-4">
    <h2>Add Product</h2>
    <form method="post" action="<?= $this->url('productadd'); ?>">
        <label for="name">Product Name:</label>
        <input type="text" name="name" required>

        <label for="description">Product Description:</label>
        <textarea name="description" required></textarea>

        <label for="price">Product Price:</label>
        <input type="number" name="price" required>

        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</main>

<?php $this->layout('master', ['title' => 'Update Product']) ?>

<main class="container mt-4">
    <h2>Update Product</h2>
    
    <form method="post" action="<?= $this->url('updateproduct'); ?>">
        <label for="name">Product Name:</label>
        <input type="text" name="name" value="<?= isset($product['Name']) ? $this->e($product['Name']) : ''; ?>" required>

        <label for="description">Product Description:</label>
        <textarea name="description" required><?= isset($product['Description']) ? $this->e($product['Description']) : ''; ?></textarea>

        <label for="price">Product Price:</label>
        <input type="number" name="price" value="<?= isset($product['Price']) ? $this->e($product['Price']) : ''; ?>" required>

        <input type="hidden" name="id" value="<?= isset($product['ProductId']) ? $this->e($product['ProductId']) : ''; ?>">
        <button type="submit" class="btn btn-warning">Update Product</button>
    </form>
</main>

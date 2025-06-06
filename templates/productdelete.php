<?php $this->layout('master', ['title' => 'Delete Product']) ?>

<main class="container mt-4">
    <h2>Delete Product</h2>
    <p>Are you sure you want to delete this product?</p>
    <p><strong>Product Name:</strong> <?= $this->e($product['Name']); ?></p>
    <p><strong>Product Description:</strong> <?= $this->e($product['Description']); ?></p>
    <p><strong>Product Price:</strong> <?= $this->e($product['Price']); ?></p>

    <form method="post" action="<?= $this->url('deleteproduct'); ?>">
        <input type="hidden" name="id" value="<?= $this->e($product['ProductId']); ?>">
        <button type="submit" class="btn btn-danger">Delete Product</button>
    </form>
</main>

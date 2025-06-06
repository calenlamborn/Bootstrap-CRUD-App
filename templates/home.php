<?php $this->layout('master', ['title' => 'Products']) ?>

<main class="container mt-4">
    <h2>Products</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $this->e($product['Name']) ?></td>
                    <td><?= $this->e($product['Description']) ?></td>
                    <td>$<?= $this->e($product['Price']) ?></td>
                    <td>
                        <a href="<?= $this->url('productdetail', ['id' => $product['ProductId']]) ?>" class="btn btn-info">Details</a>
                        <a href="<?= $this->url('productupdate', ['id' => $product['ProductId']]) ?>" class="btn btn-warning">Update</a>
                        <a href="<?= $this->url('productdelete', ['id' => $product['ProductId']]) ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= $this->url('productadd') ?>" class="btn btn-primary">Add Product</a>
</main>

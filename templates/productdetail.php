<?php $this->layout('master', ['title' => 'Product Detail']) ?>

<main>
    <h2>Product Detail</h2>
    <div>
        <p>Name: <?= $this->e($product['Name']) ?></p>
        <p>Description: <?= $this->e($product['Description']) ?></p>
        <p>Price: $<?= $this->e($product['Price']) ?></p>
    </div>
</main>

<?php $this->layout('master', ['title' => "Order Details"]) ?>

<main class="container mt-4">
    <h2>User Orders</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($order): ?>
                <tr>
                    <td><?= $this->e($order['OrderId']) ?></td>
                    <td><?= $this->e($order['UserId']) ?></td>
                    <td><?= $this->e($order['OrderDate']) ?></td>
                </tr>
            <?php else: ?>
                <tr>
                    <td colspan="3">No order details found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h3>Order Items</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($orderItems): ?>
                <?php foreach ($orderItems as $item): ?>
                    <tr>
                        <td><?= $this->e($item['ProductId']) ?></td>
                        <td><?= $this->e($item['Quantity']) ?></td>
                        <td><?= $this->e($item['Price']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No order items found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</main>

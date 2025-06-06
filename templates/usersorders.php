<?php $this->layout('master', ['title' => "User Orders"]) ?>

<main class="container mt-4">
    <h2>User Orders</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Order Details</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($orders): ?>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= $this->e($order['UserId']) ?></td>
                        <td><?= $this->e($order['OrderId']) ?></td>
                        <td><?= $this->e($order['OrderDate']) ?></td>
                        <td><a href="<?= $this->url('orderdetail', ['id' => $order['OrderId']]) ?>" class="btn btn-info btn-block">View Details</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No orders found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</main>

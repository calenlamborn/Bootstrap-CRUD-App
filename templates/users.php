<?php $this->layout('master', ['title' => "Users"]) ?>

<main class="container mt-4">
    <h2>Users</h2>
    <table class="table">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Details</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->e($user['UserId']) ?></td>
                    <td><?= $this->e($user['Name']) ?></td>
                    <td>
                        <a href="<?= $this->url('userdetail', ['id' => $user['UserId']]) ?>" class="btn btn-info btn-block">User Details</a>
                        <a href="<?= $this->url('usersorders', ['id' => $user['UserId']]) ?>" class="btn btn-success btn-block">User Orders</a>
                    </td>
                    <td>
                        <a href="<?= $this->url('userupdate', ['id' => $user['UserId']]) ?>" class="btn btn-warning btn-block">Update User</a>
                    </td>
                    <td>
                        <a href="<?= $this->url('userdelete', ['id' => $user['UserId']]) ?>" class="btn btn-danger btn-block">Delete User</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= $this->url('useradd') ?>" class="btn btn-primary btn-block">Add User</a>
</main>

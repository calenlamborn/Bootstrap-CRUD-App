<?php $this->layout('master', ['title' => $this->e($user['Name'])]) ?>

<main class="container mt-4">
    <h2><?= $this->e($user['Name']) ?></h2>
    <table class="table table-bordered">
        <tr>
            <th>User ID</th>
            <td><?= $this->e($user['UserId']) ?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?= $this->e($user['Name']) ?></td>
        </tr>
    </table>
</main>

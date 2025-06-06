<?php $this->layout('master', ['title' => 'Update User']) ?>

<main class="container mt-4">
    <h2>Update User</h2>
    
    <form method="post" action="<?= $this->url('updateuser'); ?>">
        <label for="name">User Name:</label>
        <input type="text" name="name" value="<?= $this->e($user['Name']); ?>" required>

        <input type="hidden" name="id" value="<?= $this->e($user['UserId']); ?>">
        <button type="submit" class="btn btn-warning">Update User</button>
    </form>
</main>

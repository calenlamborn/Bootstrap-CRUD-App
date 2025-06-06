<?php $this->layout('master', ['title' => 'Add User']) ?>

<main class="container mt-4">
    <h2>Add User</h2>
    <form method="post" action="<?= $this->url('useradd'); ?>">
        <label for="name">User Name:</label>
        <input type="text" name="name" required>

        <button type="submit" class="btn btn-primary">Add User</button>
    </form>
</main>

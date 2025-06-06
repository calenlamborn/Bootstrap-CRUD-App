<?php $this->layout('master', ['title' => 'Delete User']) ?>

<main class="container mt-4">
    <h2>Delete User</h2>
    
    <p>Are you sure you want to delete the user '<?= $this->e($user['Name']); ?>'?</p>
    
    <form method="post" action="<?= $this->url('deleteuser'); ?>">
        <input type="hidden" name="id" value="<?= $this->e($user['UserId']); ?>">
        <button type="submit" class="btn btn-danger">Delete User</button>
    </form>
</main>

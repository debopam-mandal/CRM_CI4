<h1>Users</h1>
<a href="/users/create">Add User</a>
<ul>
    <?php foreach ($users as $user): ?>
        <li><?= esc($user['username'] ?? 'No Username') ?></li>
    <?php endforeach; ?>
</ul>

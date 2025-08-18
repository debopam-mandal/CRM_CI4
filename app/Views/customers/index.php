<h1>Customers</h1>
<a href="/customers/create">Add Customer</a>
<ul>
    <?php foreach ($customers as $customer): ?>
        <li><?= esc($customer['name'] ?? 'No Name') ?></li>
    <?php endforeach; ?>
</ul>

<?php foreach ($data['user'] as $user) : ?>
    <h1> <?php echo $user->name . ' ' . $user->email ?></h1>
<?php endforeach; ?>
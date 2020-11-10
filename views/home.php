<h1>It works!</h1>

<ul>
    <?php foreach ($tasks as $task) : ?>
        <li><?= $task->title ?></li>
    <?php endforeach; ?>
</ul>

    <section>
        <h1>List tasks</h1>

        <?php
        foreach ($tasks as $task) {
        ?>
        <article>
            <em><?php echo $task->type ?></em>
            <pre><?php print_r($task) ?></pre>
        </article>
        <?php
        }
        ?>
    </section>
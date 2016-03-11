    <section>
        <h1>List tasks</h1>

        <?php
        foreach ($tasks as $taskKey => $taskValue) {
        ?>
        <article>
            <em><?php echo $taskKey ?></em>
            <pre><?php print_r($taskValue) ?></pre>
        </article>
        <?php
        }
        ?>
    </section>
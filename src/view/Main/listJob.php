    <section>
        <h1>List jobs</h1>

        <?php
        foreach ($jobs as $job) {
        ?>
        <article><?php print($job) ?></article>
        <?php
        }
        ?>
    </section>
    <section>
        <h1>List jobs</h1>

        <?php
        foreach ($jobs as $jobKey => $jobValue) {
        ?>
        <article>
            <a href="/job_get/<?php echo $jobKey ?>"><?php echo $jobValue->name ?></a>
            <pre><?php print_r($jobValue) ?></pre>
        </article>
        <?php
        }
        ?>
    </section>
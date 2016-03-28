    <section>
        <h1>Job info (new)</h1>

        <pre>
<?php print_r($job) ?>
        </pre>


        <p><a href="/job_get/<?php echo $job->id ?>/task_list">task_list</a></p>
        <p><a href="/job_get/<?php echo $job->id ?>/task_create/gzip">task_create/gzip</a></p>
    </section>
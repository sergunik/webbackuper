
<section>
    <h1>title</h1>
    <em>description</em>

    <form action="/job_get/<?php echo $job->id ?>/task_save/gzip" method="post">
        <article>
            <fieldset>
                <legend>New task</legend>
                <input type="hidden" name="id" value="<?php echo date("YmdHis") ?>" />

                <label for="job_name">Name of job</label>
                <input id="job_name" type="text" name="name" value="<?php echo $entity->name ?>" />
                <!--            TODO: Generate some fun titles-->

                <label for="job_fileToArchiving">File to archiving</label>
                <input id="job_fileToArchiving" type="text" name="fileToArchiving" value="<?php echo $entity->fileToArchiving ?>" />

                <label for="job_fileResult">File result</label>
                <input id="job_fileResult" type="text" name="fileResult" value="<?php echo $entity->fileResult ?>" />

                <input type="submit" value="Save" />
            </fieldset>
        </article>
    </form>

</section>
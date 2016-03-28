    <section>
        <h1>Job create (new)</h1>

        <form action="/job_save" method="post">
            <article>
                <fieldset>
                    <legend>New job</legend>
                    <input type="hidden" name="id" value="<?php echo date("YmdHis") ?>" />

                    <label for="job_name">Name of job</label>
                    <input id="job_name" type="text" name="name" value="Name of job" />
                    <!--            TODO: Generate some fun titles-->

                    <input type="submit" value="Save" />
                </fieldset>
            </article>
        </form>

    </section>
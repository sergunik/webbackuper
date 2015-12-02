    <section>
        <h1>Add job</h1>

        <form action="/save_job" method="post">
            <input type="text" name="title" value="<?php echo date("YmdHis") ?>" />

            <article>
                <h2>Before</h2>

                <fieldset>
                    <legend>Add Commands</legend>

                    <label>Host</label>
                    <select name="before_host">
                        <option value="root@localhost">root@localhost</option>
                        <option value="0">/add</option>
                    </select>

                    <label>Commands</label>
                    <textarea name="before_commands">/hello</textarea>
                </fieldset>
            </article>

            <article>
                <h2>BackUp</h2>

                <h3>From</h3>
                <select name="from_host">
                    <option value="root@localhost">root@localhost</option>
                    <option value="0">/add</option>
                </select>
                :
                <input type="text" name="from_path" value="/home/serg/1.txt" />

                <h3>To</h3>
                <select name="to_host">
                    <option value="root@localhost">root@localhost</option>
                    <option value="0">/add</option>
                </select>
                :
                <input type="text" name="to_path" value="/var/logs/1.txt" />

                <p>
                    Examples...
                </p>
            </article>

            <article>
                <h2>After</h2>

                <fieldset>
                    <legend>Add Commands</legend>

                    <label>Host</label>
                    <select name="after_host">
                        <option value="0">/add</option>
                        <option value="root@localhost">root@localhost</option>
                    </select>

                    <label>Commands</label>
                    <textarea name="after_commands">/buy</textarea>
                </fieldset>
            </article>

            <input type="submit" value="Save" />
        </form>
    </section>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo PROJECT_NAME ?></title>
    <link rel="stylesheet" type="text/css" href="/style.css">
</head>
<body>

    <header>
        <h1><?php echo PROJECT_NAME ?></h1>
    </header>

    <nav>
        <ul>
            <li><a href="/">/</a></li>
            <li><a href="/list_job">/list_job</a></li>
            <li><a href="/add_job">/add_job</a></li>
        </ul>
    </nav>

    <section>
        <h1>Add job</h1>

        <form action="/save_job" method="post">
            <input type="text" name="title" value="<?php \Webbackuper\service\Generator::defaultJobTitle() ?>" />

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

    <footer>Footer - Copyright 2015</footer>


<!--    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>-->
    <script src="/jquery.js"></script>
</body>
</html>
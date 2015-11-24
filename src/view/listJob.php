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
        <hr>
        <ul>
            <li><a href="/">/</a></li>
            <li><a href="/list_job">/list_job</a></li>
            <li><a href="/add_job">/add_job</a></li>
        </ul>
        <hr>
    </nav>

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

    <footer>
        <hr>
        Footer - Copyright 2015
    </footer>


<!--    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>-->
    <script src="/jquery.js"></script>
</body>
</html>
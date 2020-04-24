<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="This is a todo List assigment">
    <meta name="author" content="DevShawon">
    <title>PHP Todos</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Custom Css files -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="text-center">
    <section class="todoapp">
        <header class="header">
            <h1>PHP Todos</h1>
            <input class="new-todo" autocomplete="off" placeholder="What needs to be done?">
        </header>
        <section class="main">
            <input type="checkbox" class="toggle-all">
            <ul class="todo-list" data-status="all">

            </ul>
        </section>
        <footer class="footer">
            <span class="todo-count">
                <strong>0</strong> item left</span>
            <ul class="filters">
                <li><a href="#" class="selected">All</a></li>
                <li><a href="#">Active</a></li>
                <li><a href="#">Completed</a></li>
            </ul>
            <button class="clear-completed">Clear completed</button>
        </footer>
    </section>
    <!-- Jquery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrape Min js  -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All ajax call in app.js -->
    <script src="js/app.js"></script>
</body>

</html>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/reset.css" type="text/css">
        <link rel="stylesheet" href="css/addpost.css" type="text/css">
        <script src="/elisovskis-phase2/js/addpost.js" defer></script>
        <noscript>Enable JavaScript</noscript>
        <title>addpost - Blog</title>
    </head>

    <body class="colour1">

        <?php include "header.php" ?>

        <div class="container">
            <form method="POST" action="injectpost.php" class="blog-form" id="form">
                <fieldset>
                    <legend>Add a blog post</legend>

                        <div>
                            <p class="title">
                                <input type="text" name="title" id="title" placeholder="Title" autofocus>
                            </p>
                            <p class="blog-post">
                                <textarea type="text" name="blog-post" id="blog-post" placeholder="Start your blog post"></textarea>
                            </p>
                            <div id="loginTextDiv">
                                <p id="loginText">

                                </p>
                            </div>
                        </div>

                    <div class="submit-reset">
                        <input type="submit" value="Submit" name="submit-button">
                        <button id="reset" value="reset" class="button">Clear</button>
                    </div>

                </fieldset>
            
            </form>

        </div>

        <footer id="copyright" class="colour1">
            <p>&#169; Eduards Lisovskis 2023</p>
        </footer>

    </body>

</html>


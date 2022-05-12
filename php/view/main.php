<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php if(!isset($head)){ ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="https://code.jquery.com/jquery-3.6.0.js"
                integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
                crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"
                integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY="
                crossorigin="anonymous"></script>
    <?= $script ?>

        <link rel="stylesheet" type="text/css" href="../../public/css/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">

        <noscript>
            This page needs JavaScript activated to work.
            <style>div { display:none; }</style>
        </noscript>

        <title><?php $title ?></title>

    <?php } else { echo $head; }  ?>

</head>
<body>

<header>

    <?= $header  ?>

</header>

<main>

    <?= $main  ?>

</main>

<footer>

    <?= $footer  ?>

</footer>

</html>
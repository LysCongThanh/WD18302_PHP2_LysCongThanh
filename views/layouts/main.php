<html lang="en">

<?php include_once __DIR__ . '/../blocks/head.php'; ?>

<body class="g-sidenav-show bg-gray-100">

<div class="min-height-300 bg-primary position-absolute w-100"></div>

<?php include_once __DIR__ . '/../blocks/aside.php'?>

<main class="main-content position-relative border-radius-lg ">

    <?php include_once __DIR__ . '/../blocks/nav.php' ?>

    <div class="container-fluid py-4">

        {{content}}

        <?php include_once __DIR__ . '/../blocks/footer.php' ?>

    </div>
</main>

<?php include_once __DIR__ . '/../blocks/fixed.php'?>

<?php include_once __DIR__ . '/../blocks/scripts.php' ?>

</body>

</html>
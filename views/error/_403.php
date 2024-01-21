<main class="main-content  mt-0 py-10">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-7 mx-auto text-center">
                <h1 class="display-1 text-bolder text-danger">Error <?= $exception->getCode() ?></h1>
                <h2><?= $exception->getMessage() ?></h2>
            </div>
        </div>
    </div>
</main>
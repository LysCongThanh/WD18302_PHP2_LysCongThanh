<?php $this->title = $title ?>

<div class="page-header min-vh-100" style="background-image: url('/assets/img/illustrations/404.svg');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-7 mx-auto text-center">
                <h1 class="fs-2 display-1 text-bolder text-danger"><?= $exception->getCode() ?> - Forbidden</h1>
                <h2>Bạn không đủ quyền để làm điều này !</h2>
                <a href="/" type="button" class="btn bg-gradient-dark mt-4">Về trang chủ</a>
            </div>
        </div>
    </div>
</div>

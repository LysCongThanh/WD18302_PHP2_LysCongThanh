<?php $this->title = $title ?>

<div class="page-header min-vh-100" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/error-500.jpg');">
    <span class="mask bg-gradient-warning opacity-4"></span>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-7 mx-auto text-center">
                <h1 class="display-1 text-bolder text-white fadeIn1 fadeInBottom mt-5"><?= $exception ?></h1>
                <h2 class="fadeIn3 fadeInBottom mt-3 text-white">Co gi co khong on !</h2>
                <p class="lead fadeIn2 fadeInBottom text-white">Chúng tôi khuyên bạn nên truy cập trang chủ trong khi chúng tôi giải quyết vấn đề này..</p>
                <a href="/" class="btn bg-gradient-warning mt-4 fadeIn2 fadeInBottom">Quay ve trang chu</a>
            </div>
        </div>
    </div>
</div>
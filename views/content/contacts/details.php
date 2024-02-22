<?php

$this->title = $title;

?>

<div class="row">
    <div class="col-lg-6">
        <h4 class="text-white">Thông tin liên hệ</h4>
        <p class="text-white opacity-8">Chúng tôi không ngừng cố gắng thể hiện bản thân và hiện thực hóa ước mơ của mình. Nếu bạn có cơ hội chơi.</p>
    </div>
    <div class="col-lg-6 text-right d-flex flex-column justify-content-center">
        <a href="/contacts/edit?id=<?= $contact->id ?>" type="button" class="btn btn-outline-white mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2">Sửa</a>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-4">
        <div class="row">
            <div class="col-12">
                <div class="card card-profile">
                    <img src="/assets/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-4 col-lg-4 order-lg-2">
                            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                <a href="<?= $app->url(''.$contact->image) ?>">
                                    <img src="<?= $app->url(''.$contact->image) ?>" class="rounded-circle img-fluid border border-2 border-white">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                        <div class="d-flex justify-content-center">
                            <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Gọi</a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex justify-content-center">
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <h5>
                                <?= $contact->name ?>
                            </h5>
                            <div class="h6 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i><?= $contact->telephone ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <h5 class="font-weight-bolder">Nhóm liên hệ</h5>
                            <a href="" class="btn btn-primary">+ Thêm mới</a>
                        </div>
                        <ul class="list-group">
  <li class="list-group-item">An item</li>
  <li class="list-group-item">A second item</li>
  <li class="list-group-item">A third item</li>
  <li class="list-group-item">A fourth item</li>
  <li class="list-group-item">And a fifth one</li>
</ul>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0">Thong tin ca nhan</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <hr class="horizontal gray-light my-4">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Ten day du:</strong> &nbsp; Alec M. Thompson</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">So dien thoai:</strong> &nbsp; (44) 123 1234 123</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="82e3eee7e1f6eaedeff2f1edecc2efe3ebeeace1edef">[email&#160;protected]</a></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Dia chi:</strong> &nbsp; Can Tho</li>
                        </ul>
                    </div>
                </div>


            </div>
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <h5 class="font-weight-bolder">Ghi chu</h5>
                            <a href="" class="btn btn-primary">+ them moi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
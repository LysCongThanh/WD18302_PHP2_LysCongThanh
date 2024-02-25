<?php

$this->title = $title;

var_dump($groupsOfContact)

?>

<div class="row" id="contact-edit">
    <div class="col-lg-6">
        <h4 class="text-white">Chỉnh sửa liên hệ</h4>
        <p class="text-white opacity-8">
            Chúng tôi không ngừng cố gắng thể hiện bản thân và hiện thực hóa ước mơ của mình.
        </p>
    </div>
    <div class="col-lg-6 text-right d-flex flex-column justify-content-center">
        <button type="button" class="btn btn-outline-white mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2">Cập nhật</button>
    </div>
</div>
<div class="row mt-4">
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="font-weight-bolder">Ảnh đại diện</h5>
                <div class="row">
                    <div class="col-12">
                        <img class="w-100 border-radius-lg shadow-lg mt-3" src="<?= $app->url('' . $contact->image) ?>" alt="product_image">
                    </div>
                    <div class="col-12 mt-5">
                        <div class="d-flex">
                            <button class="btn btn-primary btn-sm mb-0 me-2" type="button" name="button">Sửa</button>
                            <button class="btn btn-outline-dark btn-sm mb-0" type="button" name="button">Xóa</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 mt-lg-0 mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="font-weight-bolder">Thông tin</h5>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label>Tên</label>
                        <input class="form-control" type="text" value="<?= $contact->name ?>" />
                    </div>
                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <label>Số điện thoại</label>
                        <input class="form-control" type="text" value="<?= $contact->telephone ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="mt-4">Doanh nghiệp</label>
                        <input class="form-control" type="text" value="<?= $contact->company ?>" />
                    </div>
                    <div class="col-6 form-group">
                        <label class="mt-4">Nhóm liên hệ</label>
                        <select class="form-control" name="groups" id="choices-groups" multiple>
                            <option value="" disabled>Phân loại liên hệ</option>

                            <?php if (count($groupsOfContact) > 0) : ?>
                                <?php foreach ($groupsOfContact as $group) : ?>
                                    <?php extract($group) ?>

                                    <!-- Load data here -->
                                    <option value="<?= $group_id ?>"><?= $group_name ?></option>

                                <?php endforeach; ?>
                            <?php endif; ?>

                        </select>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
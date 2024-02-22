<?php

?>

<div class="row mb-5">
    <div class="col-lg-12 mt-lg-0 mt-4">

        <form action="<?= $app->url('contacts/add') ?>" method="post" id="form-add-contact">
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <h5>Thông tin liên hệ</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6 form-group">
                            <label class="form-label">Tên liên hệ</label>

                            <input id="firstName" name="name" class="form-control" type="text" placeholder="Nhập tên liên hệ...">

                            <div class="form-message"></div>
                        </div>
                        <div class="col-6 form-group">
                            <label class="form-label">Số điện thoại</label>

                            <input id="lastName" name="telephone" class="form-control" type="text" placeholder="Nhập số điện thoại...">

                            <div class="form-message"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-5 col-5 form-group">
                                    <label class="form-label mt-4">Doanh nghiệp</label>
                                    <input class="form-control" name="company" placeholder="Nhập tên doanh nghiệp">
                                    <div class="form-message"></div>
                                </div>
                                <div class="col-sm-7 col-7 form-group">
                                    <label class="form-label mt-4">Nhóm liên hệ</label>
                                    <select class="form-control" name="group" id="choices-group" multiple>
                                        <option value="" disabled>Phân loại liên hệ</option>
                                    </select>
                                    <div class="form-message"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4" id="password">
                <div class="card-header">
                    <h5>Ảnh đại diện</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row mt-3">
                        <div class="col-12">
                            <label>Hình ảnh</label>
                            <div action="/file-upload" class="form-control dropzone" id="image"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Thêm mới</button>
                </div>
            </div>
        </form>

    </div>
</div> 
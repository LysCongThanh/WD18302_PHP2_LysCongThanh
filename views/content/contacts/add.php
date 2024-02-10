<?php

?>

<div class="row mb-5">
    <div class="col-lg-12 mt-lg-0 mt-4">

        <form action="<?= $app->url('contacts/add') ?>" method="post" id="form-add-contact">
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <h5>Thong tin lien lac</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Ten lien he</label>
                            <div class="input-group">
                                <input id="firstName" name="name" class="form-control" type="text" placeholder="Nhap ten lien he..." required="required">
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">So dien thoai</label>
                            <div class="input-group">
                                <input id="lastName" name="telephone" class="form-control" type="text" placeholder="Nhap so dien thoai..." required="required">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-5 col-5">
                                    <label class="form-label mt-4">Doanh nghiep</label>
                                    <input class="form-control" name="company" placeholder="Nhap ten doanh nghiep">
                                </div>
                                <div class="col-sm-7 col-7">
                                    <label class="form-label mt-4">Nhom lien he</label>
                                    <select class="form-control" name="group" id="choices-group" multiple>
                                        <option value="English">English</option>
                                        <option value="French">French</option>
                                        <option value="Spanish">Spanish</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4" id="password">
                <div class="card-header">
                    <h5>Hinh nen</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row mt-3">
                        <div class="col-12">
                            <label>Product images</label>
                            <div action="/file-upload" class="form-control dropzone" id="productImg"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Thêm mới</button>
                </div>
            </div>
        </form>

    </div>
</div>
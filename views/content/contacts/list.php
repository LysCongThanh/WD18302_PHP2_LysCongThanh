<?php

$this->title = $title;

?>

<div class="row contacts-page list">
    <div class="col-12">
        <div class="card">

            <div class="card-header pb-0">
                <div>
                    <h5 class="mb-0">Liên hệ</h5>
                    <p class="text-sm mb-0">
                    </p>
                </div>
                <div class="d-lg-flex">
                    <div class="ms-auto my-auto mt-lg-0 mt-4">
                        <div class="ms-auto my-auto">
                            <a href="/contacts/add" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp;
                                Thêm liên hệ</a>
                            <button type="button" id="btn-remove" class="btn bg-gradient-warning btn-sm mb-0">
                                Xóa liên hệ
                            </button>
                            <button type="button" class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#import">
                                Nhập liên hệ
                            </button>
                            <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog mt-lg-10">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabel">Nhập CSV</h5>
                                            <i class="fas fa-upload ms-3"></i>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Bạn có thể duyệt máy tính của bạn để tìm một tập tin.</p>
                                            <input type="text" placeholder="Duyệt tập tin" class="form-control mb-3">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-dismiss="modal">Đóng
                                            </button>
                                            <button type="button" class="btn bg-gradient-primary btn-sm">Tải file</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Xuất dữ liệu
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-0">
                <div class="table-responsive">
                    <table class="table table-flush" id="products-list">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Liên hệ</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Doanh nghiệp
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Số điện thoại
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Ngày tạo
                                </th>
                                <th class="text-secondary opacity-7">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($contacts as $contact) : ?>
                                <?php extract($contact) ?>
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="form-check my-auto">
                                                <input class="form-check-input checkbox-item" value="<?= $id ?>" type="checkbox" id="customCheck1">
                                            </div>


                                            <img src="<?= $app->url('') ?><?= $image ?>" class="avatar avatar-sm me-3" alt="user1">

                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm"><?= $name ?></h6>
                                                <p class="text-xs text-secondary mb-0"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="147e7b7c7a5477667175607d627139607d793a777b79">[email&#160;protected]</a>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?= $company ?></p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold"><?= $telephone ?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold"><?= $helpers->formatHelpers->date_formatted($created_at) ?></span>
                                    </td>
                                    <td class="text-sm text-center">
                                        <button class="detail-contact-btn m-0 p-3 rounded-2 btn" data-id="<?= $id ?>">
                                            <i class="fas fa-eye text-secondary"></i>
                                        </button>
                                        <a href="<?= $app->url('contacts/edit?id='.$id) ?>" class="edit-contact-btn m-0 p-3 rounded-2 btn mx-2" data-id="<?= $id ?>">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <button class="remove-contact-btn m-0 p-3 rounded-2 btn" data-id="<?= $id ?>">
                                            <i class="fas fa-trash text-secondary"></i>
                                        </button>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
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
                            <a href="/contacts/add" class="btn bg-gradient-primary btn-sm mb-0" target="_blank">+&nbsp;
                                Thêm liên hệ</a>
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
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="<?= $app->url('') ?><?= $image ?>" class="avatar avatar-sm me-3" alt="user1">
                                            </div>
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
                                    <td class="align-middle text-end">
                                        <div class="dropdown">
                                            <a href="javascript:;" class="cursor-pointer" id="dropdownTable2" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-h text-secondary" aria-hidden="true"></i>
                                            </a>
                                            <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable2" style>
                                                <li><a class="dropdown-item border-radius-md" href="<?= $app->url('contacts/details?id='.$id) ?>"><i class="fas fa-eye me-2"></i> Chi tiết</a></li>
                                                <li><a class="dropdown-item border-radius-md" href="javascript:;"><i class="fas fa-user-edit me-2"></i> Sửa</a></li>
                                                <li><a class="dropdown-item border-radius-md" href="javascript:;"><i class="fas fa-trash me-2"></i> Xóa</a></li>
                                            </ul>
                                        </div>
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
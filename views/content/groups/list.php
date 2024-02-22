<div class="row mt-4" id="groups-page">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header p-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="mb-0">Nhóm liên hệ</h6>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end align-items-center">
                        <button class="btn bg-gradient-success me-3" data-bs-toggle="modal" data-bs-target="#form-add-group">Thêm mới</button>
                        <button id="btn-delete" class="btn btn-danger bg-gradient-info">Xóa</button>
                    </div>
                </div>
                <hr class="horizontal dark mb-0">
            </div>
            <div class="card-body p-3 pt-0">
                <div class="col-md-4">
                    <div class="modal fade" id="form-add-group" tabindex="-1" role="dialog" aria-labelledby="form-add-group" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="card card-plain">
                                        <div class="card-header pb-0 text-left">
                                            <h3 class="font-weight-bolder text-info text-gradient">Thêm nhóm liên hệ</h3>
                                            <p class="mb-0">Phân loại nhóm liên hệ của bạn !</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="<?= $app->url('api/groups/add') ?>" method="post" id="form-add-group">

                                                <!-- FormData start ! -->

                                                <div class="form-group">
                                                    <label for="" class="form-label">Tên nhóm liên hệ</label>
                                                    <div class="input-group">
                                                        <input type="text" name="name" id="" class="form-control" placeholder="Nhập tên nhóm...">
                                                    </div>
                                                    <div class="form-message"></div>
                                                </div>

                                                <!-- FormData end -->

                                                <div class="text-end">
                                                    <button type="submit" class="btn bg-gradient-info btn-md mt-4 mb-0">Thêm mới</button>
                                                    <button type="button" class="btn bg-gradient-secondary btn-md mt-4 mb-0" data-bs-dismiss="modal">Đóng</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush" data-toggle="checklist">
                    <?php if ($groups) : ?>
                        <?php foreach ($groups as $group) : ?>
                            <?php extract($group) ?>

                            <li class="list-group-item border-0 flex-column align-items-start ps-0 py-0 mb-3">
                                <div class="checklist-item checklist-item-primary ps-2 ms-3">
                                    <div class="d-flex align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input checkbox-item" type="checkbox" value="<?= $id ?>" id="flexCheckDefault">
                                        </div>
                                        <h6 class="mb-0 text-dark font-weight-bold text-sm"><?= $name ?></h6>
                                        <div class="dropdown float-lg-end ms-auto pe-4">
                                            <a href="javascript:;" class="cursor-pointer" id="dropdownTable2" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-h text-secondary" aria-hidden="true"></i>
                                            </a>
                                            <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable2" style>
                                                <li><button class="detail-group-btn dropdown-item border-radius-md" data-group-id="<?= $id ?>">Chi tiết</button></li>
                                                <li><button class="edit-group-btn dropdown-item border-radius-md" data-group-id="<?= $id ?>">Sửa</button></li>
                                                <li><button class="remove-group-btn dropdown-item border-radius-md" data-group-id="<?= $id ?>">Xóa</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center ms-4 mt-3 ps-1">
                                        <div>
                                            <p class="text-xs mb-0 text-secondary font-weight-bold">Ngày tạo</p>
                                            <span class="text-xs font-weight-bolder"><?= $helpers->formatHelpers->date_formatted($created_at) ?></span>
                                        </div>
                                        <div class="ms-auto">
                                            <p class="text-xs mb-0 text-secondary font-weight-bold">Ngày cập nhật</p>
                                            <span class="text-xs font-weight-bolder">
                                                <?= $helpers->formatHelpers->date_formatted($updated_at) ?>
                                            </span>
                                        </div>
                                        <div class="mx-auto">
                                            <p class="text-xs mb-0 text-secondary font-weight-bold">Liên hệ</p>
                                            <span class="text-xs font-weight-bolder"><?= $contact_count ?></span>
                                        </div>
                                    </div>
                                </div>
                                <hr class="horizontal dark mt-4 mb-0">
                            </li>

                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if (!$groups) : ?>
                        <p class="text-center mb-0 text-warning font-weight-bold">Không có dữ liệu !</p>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
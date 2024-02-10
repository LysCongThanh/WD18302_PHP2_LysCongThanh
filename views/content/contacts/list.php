<?php

$this->title = $title;

?>

<div class="row contacts-page list">
    <div class="col-12">
        <div class="card">

            <div class="card-header pb-0">
                <div>
                    <h5 class="mb-0">Lien He</h5>
                    <p class="text-sm mb-0">
                    </p>
                </div>
                <div class="d-lg-flex">
                    <div class="ms-auto my-auto mt-lg-0 mt-4">
                        <div class="ms-auto my-auto">
                            <a href="/contacts/add" class="btn bg-gradient-primary btn-sm mb-0" target="_blank">+&nbsp;
                                Them lien he</a>
                            <button type="button" class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#import">
                                Import
                            </button>
                            <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog mt-lg-10">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabel">Import CSV</h5>
                                            <i class="fas fa-upload ms-3"></i>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>You can browse your computer for a file.</p>
                                            <input type="text" placeholder="Browse file..." class="form-control mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value id="importCheck" checked>
                                                <label class="custom-control-label" for="importCheck">I accept the terms
                                                    and conditions</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-dismiss="modal">Close
                                            </button>
                                            <button type="button" class="btn bg-gradient-primary btn-sm">Upload</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Export
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
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lien he</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Doanh
                                    nghiep
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    So dien thoai
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Ngay tao
                                </th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($contacts as $contact) : ?>
                                <?php extract($contact) ?>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="/assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">asd</h6>
                                                <p class="text-xs text-secondary mb-0"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="147e7b7c7a5477667175607d627139607d793a777b79">[email&#160;protected]</a>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Manager</p>
                                        <p class="text-xs text-secondary mb-0">Organization</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">0652906529</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="/contacts/details?id=1" class="text-secondary font-weight-bold text-xl" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fas fa-eye text-secondary"></i>
                                        </a>
                                        <a href="/contacts/edit?id=1" class="text-secondary font-weight-bold text-xl mx-2" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <a href="/contacts/delete" class="text-secondary font-weight-bold text-xl" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fas fa-trash text-secondary"></i>
                                        </a>
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
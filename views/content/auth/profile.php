<?php 

$this->title = $title;

?>

<div class="row mb-5">
    <div class="col-lg-3">
        <div class="card position-sticky top-1">
            <ul class="nav flex-column bg-white border-radius-lg p-3">
                <li class="nav-item pt-2">
                    <a class="nav-link text-body d-flex align-items-center" data-scroll href="#basic-info">
                        <i class="ni ni-books me-2 text-dark opacity-6"></i>
                        <span class="text-sm">Thông tin</span>
                    </a>
                </li>
                <li class="nav-item pt-2">
                    <a class="nav-link text-body d-flex align-items-center" data-scroll href="#password">
                        <i class="ni ni-atom me-2 text-dark opacity-6"></i>
                        <span class="text-sm">Mật khẩu</span>
                    </a>
                </li>
                <li class="nav-item pt-2">
                    <a class="nav-link text-body d-flex align-items-center" data-scroll href="#2fa">
                        <i class="ni ni-ui-04 me-2 text-dark opacity-6"></i>
                        <span class="text-sm">Xác thực</span>
                    </a>
                </li>
                <li class="nav-item pt-2">
                    <a class="nav-link text-body d-flex align-items-center" data-scroll href="#delete">
                        <i class="ni ni-settings-gear-65 me-2 text-dark opacity-6"></i>
                        <span class="text-sm">Xóa tài khoản</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-lg-9 mt-lg-0 mt-4">

        <div class="card card-body" id="profile">
            <div class="row justify-content-start align-items-center">
                <div class="col-sm-auto col-4">
                    <div class="avatar avatar-xl position-relative">
                        <img src="/assets/img/team-3.jpg" alt="bruce" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-sm-auto col-8 my-auto">
                    <div class="h-100">
                        <h5 class="mb-1 font-weight-bolder">
                            Mark Johnson
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            CEO / Co-Founder
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4" id="basic-info">
            <div class="card-header">
                <h5>Basic Info</h5>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-6">
                        <label class="form-label">Tên:</label>
                        <div class="input-group">
                            <input id="firstName" name="first_name" class="form-control" type="text" placeholder="Alec" required="required">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Họ:</label>
                        <div class="input-group">
                            <input id="lastName" name="last_name" class="form-control" type="text" placeholder="Thompson" required="required">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label mt-4">Email: </label>
                        <div class="input-group">
                            <input id="email" name="email" class="form-control" type="email" placeholder="example@email.com">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label mt-4">Số điện thoại: </label>
                        <div class="input-group">
                            <input id="phone" name="phone" class="form-control" placeholder="+40 735 631 620">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4" id="password">
            <div class="card-header">
                <h5>Đổi mật khẩu</h5>
            </div>
            <div class="card-body pt-0">
                <label class="form-label">Mật khẩu hiện tại</label>
                <div class="form-group">
                    <input class="form-control" type="password" placeholder="Mật khẩu hiện tại">
                </div>
                <label class="form-label">Mật khẩu mới</label>
                <div class="form-group">
                    <input class="form-control" type="password" placeholder="Mật khẩu mới">
                </div>
                <label class="form-label">Nhập lại mật khẩu mới</label>
                <div class="form-group">
                    <input class="form-control" type="password" placeholder="Nhập lại mật khẩu">
                </div>
                <h5 class="mt-5">Yêu cầu về mật khẩu</h5>
                <p class="text-muted mb-2">
                    Vui lòng làm theo hướng dẫn này để bảo mật tài khoản:
                </p>
                <ul class="text-muted ps-4 mb-0 float-start">
                    <li>
                        <span class="text-sm">1 ký tự đặc biệt</span>
                    </li>
                    <li>
                        <span class="text-sm">ít nhất 6 ký tự</span>
                    </li>
                    <li>
                        <span class="text-sm">1 số</span>
                    </li>
                    <li>
                        <span class="text-sm">thay đổi 1 ngày 8 chục lần</span>
                    </li>
                </ul>
                <button class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Cập nhật mật khẩu</button>
            </div>
        </div>

        <div class="card mt-4" id="2fa">
            <div class="card-header d-flex">
                <h5 class="mb-0">Xác thực 2 bước</h5>
                <span class="badge badge-success ms-auto">Cho phép</span>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <p class="my-auto">Khóa an toàn</p>
                    <p class="text-secondary text-sm ms-auto my-auto me-3">Không khóa an toàn</p>
                    <button class="btn btn-sm btn-outline-dark mb-0" type="button">Add</button>
                </div>
                <hr class="horizontal dark">
                <div class="d-flex">
                    <p class="my-auto">tin nhắn</p>
                    <p class="text-secondary text-sm ms-auto my-auto me-3">+4012374423</p>
                    <button class="btn btn-sm btn-outline-dark mb-0" type="button">Sửa</button>
                </div>
            </div>
        </div>

        <div class="card mt-4" id="delete">
            <div class="card-header">
                <h5>Xóa tài khoản</h5>
                <p class="text-sm mb-0">Một khi bạn xóa tài khoản của mình, bạn sẽ không thể quay lại. Xin hãy chắc chắn.</p>
            </div>
            <div class="card-body d-sm-flex pt-0">
                <div class="d-flex align-items-center mb-sm-0 mb-4">
                    <div>
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault0">
                        </div>
                    </div>
                    <div class="ms-2">
                        <span class="text-dark font-weight-bold d-block text-sm">Xác nhận</span>
                        <span class="text-xs d-block">Tôi muốn xóa tài khoản</span>
                    </div>
                </div>
                <button class="btn bg-gradient-danger mb-0 ms-2" type="button" name="button">Xóa tài khoản</button>
            </div>
        </div>
    </div>
</div>
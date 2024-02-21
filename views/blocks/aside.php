<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 text-center" href="<?= $app->url('') ?>">
            <img src="<?= $app->url('assets/img/telecards-logo.png') ?>" class="navbar-brand-img h-200" alt="main_logo">
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link <?= $helpers->navHelpers::isNavLinkActive('/') ?>" href="/">
                    <div class="icon icon-shape icon-sm text-center  me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Liên hệ</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $helpers->navHelpers::isNavLinkActive('/contacts/add') ?>" href="/contacts/add">
                    <div class="icon icon-shape icon-sm text-center  me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-ui-04 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Thêm mới</span>
                </a>
            </li>

            <li class="nav-item"><a class="nav-link <?= $helpers->navHelpers::isNavLinkActive('/groups') ?>"" href="/groups">
                    <div class="icon icon-shape icon-sm text-center  me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-archive-2 text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Nhóm liên hệ</span>
                </a>
            </li>

        </ul>
    </div>
    <div class="sidenav-footer mx-3 my-3">
        <div class="card card-plain shadow-none" id="sidenavCard">
            <img class="w-60 mx-auto" src="/assets/img/illustrations/icon-documentation.svg" alt="sidebar_illustration">
            <div class="card-body text-center p-3 w-100 pt-0">
                <div class="docs-info">
                    <h6 class="mb-0">Đăng xuất ?</h6>
                </div>
            </div>
        </div>
        <form action="/logout" method="post">
            <button type="submit" class="btn btn-dark btn-sm w-100 mb-3">Đăng xuất</button>
        </form>
    </div>
</aside>
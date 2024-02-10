<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="https://demos.creative-tim.com/argon-dashboard-pro/pages/dashboards/default.html " target="_blank">
            <img src="/assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Argon Dashboard 2 PRO</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/">
                    <div class="icon icon-shape icon-sm text-center  me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Lien he</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contacts/add">
                    <div class="icon icon-shape icon-sm text-center  me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-ui-04 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Them moi</span>
                </a>
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#ecommerceExamples" class="nav-link " aria-controls="ecommerceExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-archive-2 text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Nhom lien he</span>
                </a>
                <div class="collapse " id="ecommerceExamples">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link " href="/groups/add">
                                <span class="sidenav-mini-icon"> T </span>
                                <span class="sidenav-normal"> Tao moi </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="/groups">
                                <span class="sidenav-mini-icon"> Q </span>
                                <span class="sidenav-normal"> Quan li </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#authExamples" class="nav-link " aria-controls="authExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-copy-04 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pages</span>
                </a>
                <div class="collapse " id="authExamples">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link " href="/404">
                                <span class="sidenav-mini-icon"> T </span>
                                <span class="sidenav-normal"> 404 </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="/500">
                                <span class="sidenav-mini-icon"> T </span>
                                <span class="sidenav-normal"> 500 </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="/login">
                                <span class="sidenav-mini-icon"> T </span>
                                <span class="sidenav-normal"> dang nhap </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="/register">
                                <span class="sidenav-mini-icon"> T </span>
                                <span class="sidenav-normal"> dang ky </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="/profile">
                                <span class="sidenav-mini-icon"> T </span>
                                <span class="sidenav-normal"> Cai dat </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
        </ul>
    </div>
    <div class="sidenav-footer mx-3 my-3">
        <div class="card card-plain shadow-none" id="sidenavCard">
            <img class="w-60 mx-auto" src="/assets/img/illustrations/icon-documentation.svg" alt="sidebar_illustration">
            <div class="card-body text-center p-3 w-100 pt-0">
                <div class="docs-info">
                    <h6 class="mb-0">Dang xuat ?</h6>
                </div>
            </div>
        </div>
        <form action="/logout" method="post">
            <button type="submit" class="btn btn-dark btn-sm w-100 mb-3">Đăng xuất</button>
        </form>
    </div>
</aside>
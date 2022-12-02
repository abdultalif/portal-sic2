<div id="main" class='layout-navbar'>
    <header>
        <nav class="navbar navbar-expand navbar-light ">
            <div class="container-fluid">
                <a href="#" class="burger-btn d-block">
                    <i class="bi bi-justify fs-3"></i>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown me-3">
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?= $user['nama']; ?></h6>
                                            <p class="mb-0 text-sm text-gray-600"><?= $user['role']; ?></p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="<?= base_url('assets/images/logo/' . $user['image']); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Hello, <?= $user['nama']; ?>!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="<?= base_url('user/myprofile') ?>"><i class="fa fa-user me-2"></i> My
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url('user/editprofile') ?>"><i class="fa fa-user-edit me-2"></i>
                                            Edit Profile</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url('user/changepass') ?>"><i class="fa fa-lock me-2"></i>
                                            Change Password</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" id="logout" href="<?= base_url('auth/logout') ?>"><i class="fa fa-sign-out-alt me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
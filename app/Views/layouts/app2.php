
<!!<!doctype html>
<html lang="en">
<?= $this->include('layouts/components/header') ?>
<body>
    <div class="d-flex" id="wrapper">
        <!--  Sidebar start here  -->
<?= $this->include('layouts/components/navbar') ?>
        <!--  Sidebar end here  -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left text-primary fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportecContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle text-secondary fw-bold" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Jone Doe
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="#" class="dropdown-item">Profile</a> </li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a href="#" class="dropdown-item">Log Out</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!--  Main page star here  -->
<?= $this->renderSection('content') ?>
        <!--  Main page end here  -->
<?= $this->include('layouts/components/footer') ?>
    </div>
</body>
</html>
<!-- left sidebar -->
<!-- ============================================================== -->
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="<?= '/' . ROUTE_ADMIN_DASHBOARD; ?>">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <?php $current_request = $_SERVER['REQUEST_URI']; ?>
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link <?php echo $current_request == '/' . ROUTE_ADMIN_DASHBOARD ? 'active' : null; ?>" href="<?= '/' . ROUTE_ADMIN_DASHBOARD; ?>" aria-expanded="false"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                    </li>
                    <!-- < ?php var_dump($data); ?> -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Photography</a>
                        <div id="submenu-2" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link <?php echo $current_request == '/' . ROUTE_ADMIN_ALL_PHOTOGRAPHY ? 'active' : null; ?>" href="<?= '/' . ROUTE_ADMIN_ALL_PHOTOGRAPHY ?>">All</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link <?php echo $current_request == '/' . ROUTE_ADMIN_IMPORT ? 'active' : null; ?>" href="<?= '/' . ROUTE_ADMIN_IMPORT; ?>"></i>Import</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- ============================================================== -->
<!-- end left sidebar -->
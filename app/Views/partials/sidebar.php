<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion mt-3" id="accordionSidenav">
                <!-- Sidenav Menu Heading (Account)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <div class="sidenav-menu-heading d-sm-none">Account</div>
                <!-- Sidenav Link (Alerts)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i data-feather="bell"></i></div>
                    Alerts
                    <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                </a>
                <!-- Sidenav Link (Messages)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i data-feather="mail"></i></div>
                    Messages
                    <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                </a>

                <!-- Sidenav Accordion (Dashboard)-->
                <a class="nav-link" href="<?=site_url()?>" >
                    <div class="nav-link-icon"><i data-feather="grid"></i></div>
                    Dashboard
                </a>

                <!-- Sidenav Accordion (Pages)-->
                <a class="nav-link" href="<?=site_url('/service-list')?>" >
                    <div class="nav-link-icon"><i data-feather="list"></i></div>
                    Service Repairs List
                </a>

                <!-- Sidenav Accordion (Applications)-->
                <a class="nav-link" href="<?=site_url('/customers')?>" >
                    <div class="nav-link-icon"><i data-feather="user"></i></div>
                    Customers
                </a>

                <!-- Sidenav Accordion (Flows)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseUtilities" aria-expanded="false" aria-controls="collapseUtilities">
                    <div class="nav-link-icon"><i data-feather="settings"></i></div>
                    Settings
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseUtilities" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link" href="<?=site_url('/settings/application')?>">Application</a>
                        <a class="nav-link" href="<?=site_url('/settings/service-categories')?>">Service Categories</a>
                        <a class="nav-link" href="<?=site_url('/settings/users')?>">Users</a>
                    </nav>
                </div>

            </div>
        </div>
        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">Valerie Luna</div>
            </div>
        </div>
    </nav>
</div>

<ul class="menu-inner py-1">
    <!-- Page -->
    <li class="menu-item <?php if (url_is('dashboard')) {echo 'active';}?>">
        <a href="<?= base_url('dashboard')?>" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="Dashboard">Dashboard</div>
        </a>
    </li>
    <li class="menu-item <?php if (url_is('user')) {echo 'active';}?>">
        <a href="<?= base_url('user')?>" class="menu-link">
            <i class="menu-icon tf-icons ti ti-user"></i>
            <div data-i18n="User">User</div>
        </a>
    </li>
</ul>
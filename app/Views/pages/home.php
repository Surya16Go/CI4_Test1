<!--Start View Partials Header Vendor-->
<?= $this->extend('layouts/app') ?>
<?= $this->section('hVendor') ?>

<?= $this->endSection() ?>
<!--End View Partials Header-->

<!--Start View Partials Header Page-->
<?= $this->extend('layouts/app') ?>
<?= $this->section('hPage') ?>
    <!-- Page CSS -->

<?= $this->endSection() ?>
<!--End View Partials Header Page-->

<!--Start View Partials Footer Vendor-->
<?= $this->extend('layouts/app') ?>
<?= $this->section('fVendor') ?>

<?= $this->endSection() ?>
<!--End View Partials Footer Vendor-->

<!--Start View Partials Footer Page-->
<?= $this->extend('layouts/app') ?>
<?= $this->section('fPage') ?>

<?= $this->endSection() ?>
<!--End View Partials Page-->

<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<?= $this->endSection() ?>


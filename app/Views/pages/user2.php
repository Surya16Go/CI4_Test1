<!--Start View Partials Header Vendor-->
<?= $this->extend('layouts/app') ?>
<?= $this->section('hVendor') ?>
    <link rel="stylesheet" href="<?= base_url('')?>assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="<?= base_url('')?>assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="<?= base_url('')?>assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="<?= base_url('')?>assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="<?= base_url('')?>assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="<?= base_url('')?>assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
<?= $this->endSection() ?>
<!--End View Partials Header Vendor-->

<!--Start View Partials Header Page-->
<?= $this->extend('layouts/app') ?>
<?= $this->section('hPage') ?>
<!-- Page CSS -->

<?= $this->endSection() ?>
<!--End View Partials Header Page-->

<!--Start View Partials Footer Vendor-->
<?= $this->extend('layouts/app') ?>
<?= $this->section('fVendor') ?>
<script src="<?= base_url('')?>assets/vendor/libs/moment/moment.js"></script>
<script src="<?= base_url('')?>assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="<?= base_url('')?>assets/vendor/libs/select2/select2.js"></script>
<script src="<?= base_url('')?>assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="<?= base_url('')?>assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="<?= base_url('')?>assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
<script src="<?= base_url('')?>assets/vendor/libs/cleavejs/cleave.js"></script>
<script src="<?= base_url('')?>assets/vendor/libs/cleavejs/cleave-phone.js"></script>
<?= $this->endSection() ?>
<!--End View Partials Footer Vendor-->

<!--Start View Partials Footer Page-->
<?= $this->extend('layouts/app') ?>
<?= $this->section('fPage') ?>
<script>
$(function() {
    'use strict';

    var dt_basic_table = $('.datatables-basic');

    // DataTable with buttons
    // --------------------------------------------------------------------

    if (dt_basic_table.length) {
        dt_basic = dt_basic_table.DataTable({
            ajax: '<?= base_url('user/test')?>',
            columns: [
                { data: '' },
                { data: 'id' },
                { data: 'id' },
                { data: 'username' },
                { data: 'email' },
                { data: 'gender' },
                { data: 'status' },
                { data: 'project' },
                { data: '' }
            ],
            columnDefs: [
                {
                    // For Responsive
                    className: 'control',
                    orderable: false,
                    searchable: false,
                    responsivePriority: 2,
                    targets: 0,
                    render: function (data, type, full, meta) {
                        return '';
                    }
                },
                {
                    // For Checkboxes
                    targets: 1,
                    orderable: false,
                    searchable: false,
                    responsivePriority: 3,
                    checkboxes: true,
                    render: function () {
                        return '<input type="checkbox" class="dt-checkboxes form-check-input">';
                    },
                    checkboxes: {
                        selectAllRender: '<input type="checkbox" class="form-check-input">'
                    }
                },
                {
                    targets: 2,
                    searchable: false,
                    visible: true
                },
                {
                    // Avatar image/badge, Name and post
                    targets: 3,
                    responsivePriority: 4,
                    render: function (data, type, full, meta) {
                        var $name = full['username'];
                        // Creates full output for row
                        var $row_output =
                            '<div class="d-flex justify-content-start align-items-center user-name">' +
                            '<div class="d-flex flex-column">' +
                            '<span class="emp_name text-truncate">' +
                            $name +
                            '</span>' +
                            '</div>' +
                            '</div>';
                        return $row_output;
                    }
                },
                {
                    responsivePriority: 1,
                    targets: 4
                },
                {
                    // Label
                    targets: -3,
                    render: function (data, type, full, meta) {
                        var $status_number = full['status'];
                        var $status = {
                            'active': { title: 'Active', class: ' bg-label-success' },
                            'inactive': { title: 'Inactive', class: ' bg-label-danger' },
                        };
                        if (typeof $status[$status_number] === 'undefined') {
                            return data;
                        }
                        return (
                            '<span class="badge ' + $status[$status_number].class + '">' + $status[$status_number].title + '</span>'
                        );
                    }
                },
                {
                    // Label
                    targets: -2,
                    render: function (data, type, full, meta) {
                        var $project = full['project'];
                        var $row_output_project =
                            '<span class="badge bg-label-success">' +
                            $project +
                            '</span>' ;
                        return $row_output_project;
                    }
                },
                {
                    // Actions
                    targets: -1,
                    title: 'Actions',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, full, meta) {
                        var $id = full['id'];
                        var $username = full['username'];
                        var $email = full['email'];
                        var $gender = full['gender'];
                        var $status = full['status'];
                        var $project = full['project'];
                        return (
                            '<div class="d-flex align-items-center">' +
                            '<a href="javascript:;" class="text-body btn-edit" data-id="'+$id+'" data-username="'+$username+'" data-email="'+$email+'" data-gender="'+$gender+'" data-status="'+$status+'" data-project="'+$project+'" data-bs-toggle="modal" data-bs-target="#modalEdit"><i class="ti ti-edit ti-sm me-2"></i></a>' +
                            '<a href="javascript:;" class="text-body delete-record btn-delete" data-id="'+$id+'" data-username="'+$username+'" data-email="'+$email+'" data-gender="'+$gender+'" data-status="'+$status+'" data-project="'+$project+'" data-bs-toggle="modal" data-bs-target="#modalDelete"><i class="ti ti-trash ti-sm mx-2"></i></a>' +
                            '<a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a>' +
                            '<div class="dropdown-menu dropdown-menu-end m-0">' +
                            '<a href="javascript:;" class="dropdown-item btn-view" data-id="'+$id+'" data-username="'+$username+'" data-email="'+$email+'" data-gender="'+$gender+'" data-status="'+$status+'" data-project="'+$project+'" data-bs-toggle="modal" data-bs-target="#modalView" id="View">View</a>' +
                            '</div>'
                        );
                    }
                }
            ],
            order: [[2, 'asc']],
            dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 10,
            lengthMenu: [10, 25, 50, 100],
            buttons: [
                {
                    text: '<i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add New Record</span>',
                    className: 'create-new btn btn-primary'
                }
            ],
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return 'Details of ' + data['full_name'];
                        }
                    }),
                    type: 'column',
                    renderer: function (api, rowIdx, columns) {
                        var data = $.map(columns, function (col, i) {
                            return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                                ? '<tr data-dt-row="' +
                                col.rowIndex +
                                '" data-dt-column="' +
                                col.columnIndex +
                                '">' +
                                '<td>' +
                                col.title +
                                ':' +
                                '</td> ' +
                                '<td>' +
                                col.data +
                                '</td>' +
                                '</tr>'
                                : '';
                        }).join('');

                        return data ? $('<table class="table"/><tbody />').append(data) : false;
                    }
                }
            }
        });
        $('div.head-label').html('<h5 class="card-title mb-0">DataTable with Buttons</h5>');
    }
});
$(document).ready(function () {
    $(document).on('click','#View', function () {
        var id = $(this).data('id');
        var username = $(this).data('username');
        var email = $(this).data('email');
        var gender = $(this).data('gender');
        var status = $(this).data('status');
        var project = $(this).data('project');

        $('#id').val(id)
        $('#username').val(username)
        $('#email').val(email)
        $('#gender').find('option:selected').text()
        $('#status').find('option:selected').text()
        $('#project').val(project)
    })
})
</script>
<?= $this->endSection() ?>
<!--End View Partials Footer Page-->

<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<div class="card-datatable table-responsive pt-0">
    <div class="card-datatable table-responsive pt-0">
        <h4 class="fw-bold py-3 mb-4">
            User
        </h4>
        <table class="datatables-basic table">
            <thead>
            <tr>
                <th></th>
                <th></th>
                <th>id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Project</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>
    </div>
    <!-- Modal user View-->
    <div class="modal fade" id="modalView" tabindex="-1" aria-labelledby="modalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalScrollableTitle">Modal View</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered m-0">
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">ID</label>
                            <input type="text" class="form-control" id="id" disabled/>
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" disabled/>
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" disabled/>
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Gender</label>
                            <select id="gender" class="form-select" disabled>
                                <option value="1">Laki-Laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Status</label>
                            <select id="status" class="form-select" disabled>
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="select2Multiple" class="form-label">Multiple</label>
                            <select id="select2Multiple" class="select2 form-select" multiple>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">...</label>
                            <input type="text" class="form-control" id="username" value="..." disabled/>
                        </div>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Oke</button>
            </div>
        </div>
    </div>
    <!-- Modal user edit-->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalScrollableTitle">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal user delete-->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalScrollableTitle">Hapus User ...</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin untuk menghapus user ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus User</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal to add new user -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
            <form class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewUserForm" onsubmit="return false" novalidate="novalidate">
                <div class="mb-3 fv-plugins-icon-container">
                    <label class="form-label" for="add-user-fullname">Full Name</label>
                    <input type="text" class="form-control" id="add-user-fullname" placeholder="John Doe" name="userFullname" aria-label="John Doe">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                <div class="mb-3 fv-plugins-icon-container">
                    <label class="form-label" for="add-user-email">Email</label>
                    <input type="text" id="add-user-email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="userEmail">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                <div class="mb-3">
                    <label class="form-label" for="add-user-contact">Contact</label>
                    <input type="text" id="add-user-contact" class="form-control phone-mask" placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com" name="userContact">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="add-user-company">Company</label>
                    <input type="text" id="add-user-company" class="form-control" placeholder="Web Developer" aria-label="jdoe1" name="companyName">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="country">Country</label>
                    <div class="position-relative"><select id="country" class="select2 form-select select2-hidden-accessible" data-select2-id="country" tabindex="-1" aria-hidden="true">
                            <option value="" data-select2-id="2">Select</option>
                            <option value="Australia">Australia</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Canada">Canada</option>
                            <option value="China">China</option>
                            <option value="France">France</option>
                            <option value="Germany">Germany</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Japan">Japan</option>
                            <option value="Korea">Korea, Republic of</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Russia">Russian Federation</option>
                            <option value="South Africa">South Africa</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: 352px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-country-container"><span class="select2-selection__rendered" id="select2-country-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Select Country</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="user-role">User Role</label>
                    <select id="user-role" class="form-select">
                        <option value="subscriber">Subscriber</option>
                        <option value="editor">Editor</option>
                        <option value="maintainer">Maintainer</option>
                        <option value="author">Author</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="form-label" for="user-plan">Select Plan</label>
                    <select id="user-plan" class="form-select">
                        <option value="basic">Basic</option>
                        <option value="enterprise">Enterprise</option>
                        <option value="company">Company</option>
                        <option value="team">Team</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit waves-effect waves-light">Submit</button>
                <button type="reset" class="btn btn-label-secondary waves-effect" data-bs-dismiss="offcanvas">Cancel</button>
                <input type="hidden"></form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>


<!--Start View Partials Header Vendor-->
<?= $this->extend('layouts/app') ?>
<?= $this->section('hVendor') ?>
    <link rel="stylesheet" href="<?= base_url('')?>assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="<?= base_url('')?>assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="<?= base_url('')?>assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="<?= base_url('')?>assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="<?= base_url('')?>assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="<?= base_url('')?>assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
    <link rel="stylesheet" href="<?= base_url('')?>assets/vendor/libs/toastr/toastr.css" />
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
<script src="<?= base_url('')?>assets/vendor/libs/toastr/toastr.js"></script>
<?= $this->endSection() ?>
<!--End View Partials Footer Vendor-->

<!--Start View Partials Footer Page-->
<?= $this->extend('layouts/app') ?>
<?= $this->section('fPage') ?>
<link rel="stylesheet" href="<?= base_url('')?>assets/vendor/libs/toastr/toastr.js" />
<script>
$(function() {
    'use strict';

    var dt_basic_table = $('.datatables-basic');

    // DataTable with buttons
    // --------------------------------------------------------------------

    if (dt_basic_table.length) {
        var dt_basic = dt_basic_table.DataTable({
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
                            '<div class="d-flex align-items-center">'+
                            '<a href="#" onclick="viewUser('+$id+',1)" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a>' +
                            '<a href="#" onclick="viewUser('+$id+',2)" class="text-body"><i class="ti ti-trash ti-sm mx-2"></i></a>' +
                            '<a class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a>' +
                            '<div class="dropdown-menu dropdown-menu-end m-0">' +
                            '<a href="#" onclick="viewUser('+$id+',3)" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#modalView">View</a>' +
                            '</div>'
                        );
                    }
                }
            ],
            order: [[2, 'desc']],
            dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 10,
            lengthMenu: [10, 25, 50, 100],
            buttons: [
                {
                    text: '<i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add User</span>',
                    className: 'create-new btn btn-primary',
                    attr: { "data-bs-toggle": "modal", "data-bs-target": "#modalAdd" },
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
function viewUser(id,btnClick) {
    <?php header('Content-type: application/json'); ?>
    $.ajax({
        type: 'GET',
        url : '<?= base_url('user/')?>' + id,
        dataType: 'json',
        success: function(data)
        {
            if (btnClick === 1) {
                $('#modalEdit').modal('show'); // show bootstrap modal when complete loaded
                $('.modalScrollableTitle').text('Edit User'); // Set title to Bootstrap modal title
                $('#idEdit').val(data.id);
                $('#usernameEdit').val(data.username);
                $('#emailEdit').val(data.email);
                $('#genderEdit').val(data.gender);
                $('#statusEdit').val(data.status);
                $('#projectEdit').val(data.project);
            } else if (btnClick === 2) {
                $('#modalDelete').modal('show');
                $('.modalScrollableTitle').text('Hapus User');
                $('#idDelete').val(data.id);
                $('#usernameDelete').val(data.username);
                $('#emailDelete').val(data.email);
            } else if (btnClick === 3) {
                $('#modalView').modal('show');
                $('.modalScrollableTitle').text('View User');
                $('#idView').val(data.id);
                $('#usernameView').val(data.username);
                $('#emailView').val(data.email);
                $('#genderView').val(data.gender);
                $('#statusView').val(data.status);
                $('#projectView').val(data.project);
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log(jqXHR);
            alert('Error get data from ajax');
        }
    });
};
function userDelete(id,username) {
    $('#id').text(id);
    $('#username').text(username);
    <?php header('Content-type: application/json'); ?>
    $.ajax({
        type: 'POST',
        url: '<?= base_url('user/delete/')?>' + id,
        dataType: 'json',
        success: function (data) {
            if (data.success == false) {
                console.log(data.errorDetail);
                alert('Error deleting data');
            } else {
                $('.datatables-basic').DataTable().ajax.reload();
                $("#modalDelete").modal('hide');
                $(function () {
                    toastr.success("Data berhasil di hapus")
                });
            }
        }
    });
}
</script>
<script>
$(function () {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
});
$(function() {
    $('#addUserBtn').click(function()
    {
        event.preventDefault();
        var formData = {
            'username'  : $('input[name=username]').val(),
            'email'     : $('input[name=email]').val(),
            'gender'    : $('#gender option:selected').val(),
            'status'    : $('#status option:selected').val(),
            'project'   : $('#project option:selected').val(),
        };
        $.ajax({
            type        : 'POST',
            url         : '<?= base_url('user/add')?>',
            data        : formData,
            dataType    : 'json',
            success     : function(data){
                if (data.success == false)
                {
                    console.log(data.errorDetail)
                }
                else
                {
                    $('.datatables-basic').DataTable().ajax.reload();
                    $('#fromAdd').trigger('reset');
                    $("#modalAdd").modal('hide');
                    $(function () {
                        toastr.success("Data berhasil di upload")
                    });
                }
            }
        });
    });
});
$(function() {
    $('#editUserBtn').click(function()
    {
        event.preventDefault();
        var id = $('input[name=id]').val();
        var formData = {
            'id'        : $('input[name=id]').val(),
            'username'  : $('input[name=username]').val(),
            'email'     : $('input[name=email]').val(),
            'gender'    : $('#gender option:selected').val(),
            'status'    : $('#status option:selected').val(),
            'project'   : $('#project option:selected').val(),
        };
        console.log(formData)
        //$.ajax({
        //    type        : 'POST',
        //    url         : '<?php //= base_url('user/edit/')?>//',
        //    data        : formData,
        //    dataType    : 'json',
        //    success     : function(data){
        //        if (data.success == false)
        //        {
        //            console.log(data.errorDetail)
        //        }
        //        else
        //        {
        //            $('.datatables-basic').DataTable().ajax.reload();
        //            $('#fromEdit').trigger('reset');
        //            $("#modalEdit").modal('hide');
        //            $(function () {
        //                toastr.success("Data berhasil di edit")
        //            });
        //        }
        //    }
        //});
    });
});
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
    <!-- Modal user Edit-->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <form id="formEdit">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalScrollableTitle">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">ID</label>
                            <input type="text" class="form-control" name="id" id="idEdit" disabled/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="usernameEdit" disabled/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="emailEdit" disabled/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <select id="genderEdit" class="form-select" disabled>
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select id="statusEdit" class="select2 form-select">
                                <option value="active" selected>Active</option>
                                <option value="inactive" selected>Inactive</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Project</label>
                            <select name="project" id="projectEdit" class="select2 form-select">
                                <option value="php">PHP</option>
                                <option value="js">JS</option>
                                <option value="ruby">Ruby</option>
                                <option value="python">Python</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-edit" id="editUserBtn">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal user View-->
    <div class="modal fade" id="modalView" tabindex="-1" aria-labelledby="modalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <form id="formEdit">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalScrollableTitle">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">ID</label>
                            <input type="text" class="form-control" name="id" id="idView" disabled/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="usernameView" disabled/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="emailView" disabled/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <select id="genderView" class="form-select" disabled>
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select id="statusView" class="select2 form-select">
                                <option value="active" selected>Active</option>
                                <option value="inactive" selected>Inactive</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Project</label>
                            <select name="project" id="projectView" class="select2 form-select">
                                <option value="php">PHP</option>
                                <option value="js">JS</option>
                                <option value="ruby">Ruby</option>
                                <option value="python">Python</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-edit" id="editUserBtn">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal user delete-->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <form id="fromAdd">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalScrollableTitle">Tambah User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">ID</label>
                            <input type="text" class="form-control" name="id" id="idDelete" disabled/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="usernameDelete" disabled/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="emailDelete" disabled/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="deleteUserBtn">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal to add new user -->
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <form id="fromAdd">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalScrollableTitle">Tambah User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" required/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email" required/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <select name="gender" id="gender" class="form-select">
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="permpuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" id="status" class="select2 form-select" required>
                                <option value="active" selected>Active</option>
                                <option value="inactive" selected>Inactive</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Project</label>
                            <select name="project" id="project" class="select2 form-select">
                                <option value="php">PHP</option>
                                <option value="js">JS</option>
                                <option value="ruby">Ruby</option>
                                <option value="python">Python</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="addUserBtn">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>


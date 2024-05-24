<?php include("./connections/connection.php"); ?>
<?php include("./connections/functions.php"); ?>
<?php include("./connections/global.php"); ?>
<?php include("./components/header.php"); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

<?php
if (@$_GET['code'] == 1) {
    Toast('success', 'Deleted Succesfully ...');
} else if (@$_GET['code'] == 2) {
    Toast('danger', 'Error Deleteing ...');
} ?>

<div id="app">
    <?php include("./components/sidebar.php") ?>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>All Users</h3>
        </div>
        <div class="page-content">
            <!-- Hoverable rows start -->
            <section class="section">
                <div class="row" id="table-hover-row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- table hover -->
                                    <div class="table-responsive">
                                        <table id="example" class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Date</th>
                                                    <th>Action (s)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            <script>
                function delete_user(id) {
                    if (confirm("Do you wish to delete this User?") == true) {
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                if (this.responseText == 'success') {
                                    window.location.href = "./all_users?code=1";
                                } else {
                                    window.location.href = "./all_users?code=2";
                                }
                            }
                        };
                        xhttp.open("GET", "./helpers/delete_user?user_id=" + id, true);
                        xhttp.send();
                    } else {
                        Toastify({
                            text: 'User Not Deleted',
                            duration: 3000,
                            close: true,
                            gravity: 'top',
                            position: 'right',
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            backgroundColor: '',
                            onClick: function() {} // Callback after click
                        }).showToast();
                    }

                }
            </script>
            <!-- Hoverable rows end -->
        </div>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
        <script>
            new DataTable('#example', {
                ajax: './api/users',
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        </script>


        <?php include("./components/footer.php"); ?>
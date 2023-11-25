<?php include("./connections/connection.php"); ?>
<?php include("./connections/functions.php"); ?>
<?php include("./connections/global.php"); ?>
<?php include("./components/header.php"); ?>

<body>
    <div id="app">
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <?php include("./components/sidebar.php") ?>
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Layout Default</h3>
                            <p class="text-subtitle text-muted">The default layout </p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Layout Default</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Loan application for all category</h4>
                        </div>
                        <div class="card-body">
                            <!-- // Basic multiple Column Form section start -->
                            <section id="multiple-column-form">
                                <div class="row match-height">
                                    <div class="col-12">
                                        <form class="form">
                                            <div class="row">
                                                <div class="form-row align-items-end;">
                                                    <div class="col">
                                                        <label>Application Number</label>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-2">
                                                            <input type="text" class="form-control" id="" placeholder="Generate" name="">
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <input type="text" class="form-control" id="" placeholder="City Code/BA Code/Application No." name="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row align-items-end;">
                                                    <div class="col">
                                                        <label>Client Id</label>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-2">
                                                            <input type="text" class="form-control" id="" placeholder="Generate" name="">
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <input type="text" class="form-control" id="" placeholder="Genrate Unique No." name="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-1 form-row align-items-end;">
                                                    <div class="row">
                                                        <div class="col">
                                                            <lable>Name</lable>
                                                        </div>
                                                        <div class="col">
                                                            <lable></lable>
                                                        </div>
                                                        <div class="col">
                                                            <lable></lable>
                                                        </div>
                                                        <div class="col">
                                                            <lable>DOB</lable>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 mb-2">
                                                            <input type="text" class="form-control" id="firstname" placeholder="First" name="firstname">
                                                        </div>
                                                        <div class="col-md-3 mb-2">
                                                            <input type="text" class="form-control" placeholder="Middle" name="middle">
                                                        </div>
                                                        <div class="col-md-3 mb-2">
                                                            <input type="text" class="form-control" placeholder="Last" name="last">
                                                        </div>
                                                        <div class="col-md-3 mb-2">
                                                            <input type="date" class="form-control" placeholder="DOB" name="bod">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-1 form-row">
                                                    <div class="col">
                                                        <lable>Father Name</lab>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 mb-2">
                                                            <input type="text" class="form-control" id="firstname" placeholder="First" name="firstname">
                                                        </div>
                                                        <div class="col-md-4 mb-2">
                                                            <input type="text" class="form-control" placeholder="Middle" name="middle">
                                                        </div>
                                                        <div class="col-md-4 mb-2">
                                                            <input type="text" class="form-control" placeholder="Last" name="last">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-1 form-row mb-4">
                                                    <div class="col">
                                                        <lable>Mother Name</lable>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-2">
                                                            <input type="text" class="form-control" id="firstname" placeholder="First" name="firstname">
                                                        </div>
                                                        <div class="col mb-2">
                                                            <input type="text" class="form-control" placeholder="Middle" name="middle">
                                                        </div>
                                                        <div class="col mb-2">
                                                            <input type="text" class="form-control" placeholder="Last" name="last">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Contact details-->
                                                <div class="form-row">
                                                    <div class="col-12">
                                                        <h6 class="text-uppercase sub-catagory mb-4">Contact details</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <lable>Mobile number</lable>
                                                        </div>
                                                        <div class="col">
                                                            <lable></lable>
                                                        </div>
                                                        <div class="col">
                                                            <lable>Alternate Mobile number</lable>
                                                        </div>
                                                        <div class="col">
                                                            <lable></lable>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-2">
                                                            <input type="text" class="form-control" id="email" placeholder="" name="email">
                                                        </div>
                                                        <div class="col mb-2">
                                                            <input type="text" class="form-control" id="email" placeholder="" name="email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="row">
                                                        <div class="col">
                                                            <lable>Whatsapp number</lable>
                                                        </div>
                                                        <div class="col">
                                                            <lable>Email Id</lable>
                                                        </div>
                                                        <div class="col">
                                                            <lable>Landline number(if any)</lable>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-2">
                                                            <input type="text" class="form-control" id="email" placeholder="" name="email">
                                                        </div>
                                                        <div class="col mb-2">
                                                            <input type="text" class="form-control" id="email" placeholder="" name="email">
                                                        </div>
                                                        <div class="col mb-2">
                                                            <input type="text" class="form-control" id="email" placeholder="" name="email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Contact details-end-->

                                                <!--INDENTITY PROOFS-->
                                                <div class="form-row mt-3">
                                                    <div class="col-12">
                                                        <h6 class="text-uppercase sub-catagory mb-4">Indentity Proofs</h6>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-lg">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th>Number</th>
                                                                    <th>Expiry(if any)</th>
                                                                    <th>Address Match</th>
                                                                    <th>Name Match</th>
                                                                    <th>DOB/AGE match</th>
                                                                    <th>Verified</th>
                                                                    <th>Attachment</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-bold-500">Passport photo</td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id="email" placeholder="Number" name="number">
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <input type="file" class="form-control form-control-sm">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">Adhaar</td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id="email" placeholder="Number" name="number">
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <input type="file" class="form-control form-control-sm">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">Pan</td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id="email" placeholder="Number" name="number">
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>

                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <input type="file" class="form-control form-control-sm">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">Passport</td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id="email" placeholder="Number" name="number">
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <input type="file" class="form-control form-control-sm">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">Passport</td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id="email" placeholder="Number" name="number">
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <input type="file" class="form-control form-control-sm">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">Voter Id</td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id="email" placeholder="Number" name="number">
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <input type="file" class="form-control form-control-sm">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">Employee ID</td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id="email" placeholder="Number" name="number">
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <input type="file" class="form-control form-control-sm">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">Other Please Specify</td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id="email" placeholder="Number" name="number">
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <select class="form-control">
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                            <option>N/A</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-bold-500">
                                                                        <input type="file" class="form-control form-control-sm">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <!--Other Details-->
                                                <div class="form-row mt-5">
                                                    <div class="col-12">
                                                        <h6 class="text-uppercase sub-catagory mb-4">Other Details</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 mb-2">
                                                            <label>Gender</label>
                                                        </div>
                                                        <div class="col-md-4 mb-2">
                                                            <label>Religion</label>
                                                        </div>
                                                        <div class="col-md-4 mb-2">
                                                            <label>Marital Status</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 mb-2">
                                                            <input type="text" class="form-control" id="gender" placeholder="" name="gender">
                                                        </div>
                                                        <div class="col mb-2">
                                                            <input type="text" class="form-control" id="religion" placeholder="" name="religion">
                                                        </div>
                                                        <div class="col mb-2">
                                                            <input type="text" class="form-control" id="marital-status" placeholder="" name="marital-status">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="row">
                                                        <div class="col-md-4 mb-2">
                                                            <label>Last Qualification</label>
                                                        </div>
                                                        <div class="col-md-4 mb-2">
                                                            <label>Professional Degree/Skill Degree(if any)</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Personal Profile(Experience)- Max 100 Words</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 mb-2">
                                                            <input type="text" class="form-control" id="last-qualification" placeholder="" name="last-qualification">
                                                        </div>
                                                        <div class="col-md-4 mb-2">
                                                            <textarea class="form-control"></textarea>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <textarea class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <!--Other Details-end-->
                                                </div>
                                            </div>
                                            <div class="form-row mt-3">
                                                <div class="col-12">
                                                    <h6 class="text-uppercase sub-catagory mb-4">All Address</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Current Residential Address</th>
                                                                <th>Permament Residential Address</th>
                                                                <th>Office/Buisness Address</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-bold-500">Mailing Address</td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                    </select>
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                    </select>
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-500">Ownership Status</td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                    </select>
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                    </select>
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-500">Ownership Status</td>
                                                                <td>
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td class=" text-bold-500">
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-500">Ownership Status</td>
                                                                <td>
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td class=" text-bold-500">
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-500">H.No/Plot No.</td>
                                                                <td>
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td class=" text-bold-500">
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-500">Street</td>
                                                                <td>
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td class=" text-bold-500">
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-500">Locality</td>
                                                                <td>
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td class=" text-bold-500">
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-500">City / State</td>
                                                                <td>
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td class=" text-bold-500">
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-500">Pin</td>
                                                                <td>
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td class=" text-bold-500">
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="form-row">
                                                    <div class="row">
                                                        <div class="col col-md-3 mb-2">
                                                            <label>Residence Video</label>
                                                        </div>
                                                        <div class="col mb-2">
                                                            <input type="file" class="form-control">
                                                        </div>

                                                        <div class="col mb-2">
                                                            <input type="file" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-row">
                                                    <div class="row">
                                                        <div class="col col-md-3 mb-2">
                                                            <label>Residence Pics</label>
                                                        </div>
                                                        <div class="col mb-2">
                                                            <input type="file" class="form-control">
                                                        </div>

                                                        <div class="col mb-2">
                                                            <input type="file" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row mt-5">
                                                <div class="col-12">
                                                    <h6 class="text-uppercase sub-catagory mb-4">Address Proofs</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Same as Indentity Proofs</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-bold-500">Mailing Address</td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-500">Ownership Status</td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-500">Adhaar Card</td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Number</th>
                                                                <th>Date Of Issue</th>
                                                                <th>Date Of Expiry</th>
                                                                <th>Name Match</th>
                                                                <th>Address Match</th>
                                                                <th>DOB/Age Match</th>
                                                                <th>Verified</th>
                                                                <th>Attachment</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-bold-500">Saving Bank Statement</td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-500">Latest Electricity Bill</td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-500">Latest House Tax Reciept</td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-500">Latest Gas Bill</td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-500">Latest Landline Bill</td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-500">Latest Postpaid Mobile Bill</td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-500">Any Other Please Specify</td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-500">Any Other Specify</td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                        <option>N/A</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="form-row mt-5">
                                                <div class="col-12">
                                                    <h6 class="text-uppercase sub-catagory mb-4">APPLICANTS FAMILY DETAILS (IF NON CO-APPLICANTS)</h6>
                                                </div>
                                                <hr>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-bold-500">Age</td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-500">Employment Status</td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Self Employed</option>
                                                                        <option>Salaried</option>
                                                                        <option>Professional</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Self Employed</option>
                                                                        <option>Salaried</option>
                                                                        <option>Professional</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Self Employed</option>
                                                                        <option>Salaried</option>
                                                                        <option>Professional</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Self Employed</option>
                                                                        <option>Salaried</option>
                                                                        <option>Professional</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Self Employed</option>
                                                                        <option>Salaried</option>
                                                                        <option>Professional</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-500">Company Name</td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-500">Monthly Income</td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="form-row align-items-end;">
                                                    <div class="row">
                                                        <div class="col-md">
                                                            <label>Personal Cibil Report</label>
                                                        </div>
                                                        <div class="col-md">
                                                            <label>Personal Cibil Report Edited</label>
                                                        </div>
                                                        <div class="col-md">
                                                            <label>Personal Crime Check</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 mb-2">
                                                            <input type="file" class="form-control">
                                                        </div>
                                                        <div class="col-md-4 mb-2">
                                                            <input type="file" class="form-control">
                                                        </div>
                                                        <div class="col-md-4 mb-2">
                                                            <input type="file" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row mt-5">
                                                <div class="col-12">
                                                    <h6 class="text-uppercase sub-catagory mb-4">ALL SAVING ACCOUNTS</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>Account Number</th>
                                                                <th>Bank Name</th>
                                                                <th>Branch</th>
                                                                <th>Date Of Opening</th>
                                                                <th>Joint Holder(If Any)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="form-row mt-5">
                                                <div class="col-12">
                                                    <h6 class="text-uppercase sub-catagory mb-4">SAVING BANK STATEMENT</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>Last Four Digit Of Account Number</th>
                                                                <th>Bank Name</th>
                                                                <th>From</th>
                                                                <th>To</th>
                                                                <th>Upload PDf To Banking Folder</th>
                                                                <th>Password(If Any)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="form-row mt-5">
                                                <div class="col-12">
                                                    <h6 class="text-uppercase sub-catagory mb-4">ALL LOANS IN PERSONAL NAME</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>Bank Name</th>
                                                                <th>Loan Type</th>
                                                                <th>Loan Account No.</th>
                                                                <th>Ownership</th>
                                                                <th>Sanctioned Amount</th>
                                                                <th>Current Balance</th>
                                                                <th>Amount Overdue</th>
                                                                <th>Rate Of Interest</th>
                                                                <th>Repayment Tenure</th>
                                                                <th>EMI Amount</th>
                                                                <th>Date Of EMI</th>
                                                                <th>Date Opened</th>
                                                                <th>Date Of Last Payment</th>
                                                                <th>Value Of Collaterial If Any Type Of Collateral</th>
                                                                <th>Overdue Amount</th>
                                                                <th>Bank Account Number For Other Penal Ties And Charges</th>
                                                                <th>Sanction</th>
                                                                <th>SOA</th>
                                                                <th>Amortisation Schedule</th>
                                                                <th>Noc</th>
                                                                <th>Cancellation Letter</th>
                                                                <th>Bt Required</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="form-row mt-5">
                                                <div class="col-12">
                                                    <h6 class="text-uppercase sub-catagory mb-4">BUISNESS/EMPLOYMENT DETAILS</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>Name Of The Company</th>
                                                                <th>Type Of Company</th>
                                                                <th>Type Of Employment</th>
                                                                <th>Address Of Company</th>
                                                                <th>Address-2 Of Company</th>
                                                                <th>Pin Code</th>
                                                                <th>Buisness Product(S)/Services(S)</th>
                                                                <th>Business Description (In 100 Words)</th>
                                                                <th>IF Salaried
                                                                    Reporting To</th>
                                                                <th>IF Salaried
                                                                    Reporting Contact</th>
                                                                <th>Share (Ownership)</th>
                                                                <th>GST Number</th>
                                                                <th>Pan Number</th>
                                                                <th>Udhyam Certificate</th>
                                                                <th>List Of Directors</th>
                                                                <th>List Of Shareholding Patter</th>
                                                                <th>GST Certificate</th>
                                                                <th>Pan Card</th>
                                                                <th>Latest Electricity Bill</th>
                                                                <th>Latest Telephone Bill</th>
                                                                <th>Property ID(In Company Name)</th>
                                                                <th>Any Other KYC</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select style="width: 200px;" class="form-control">
                                                                        <option>Proprietorship</option>
                                                                        <option>Partnership</option>
                                                                        <option>PVT. LTD</option>
                                                                        <option>Public LTD</option>
                                                                        <option>Semi-Government/PSU-Government</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select style="width: 200px;" class="form-control">
                                                                        <option>Salaried</option>
                                                                        <option>Proprietor</option>
                                                                        <option>Partner</option>
                                                                        <option>Director</option>
                                                                        <option>Trustee</option>
                                                                        <option>Share Holder</option>
                                                                        <option>Professional</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select style="width: 200px;" class="form-control">
                                                                        <option>Proprietorship</option>
                                                                        <option>Partnership</option>
                                                                        <option>PVT. LTD</option>
                                                                        <option>Public LTD</option>
                                                                        <option>Semi-Government/PSU-Government</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select style="width: 200px;" class="form-control">
                                                                        <option>Salaried</option>
                                                                        <option>Proprietor</option>
                                                                        <option>Partner</option>
                                                                        <option>Director</option>
                                                                        <option>Trustee</option>
                                                                        <option>Share Holder</option>
                                                                        <option>Professional</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select style="width: 200px;" class="form-control">
                                                                        <option>Proprietorship</option>
                                                                        <option>Partnership</option>
                                                                        <option>PVT. LTD</option>
                                                                        <option>Public LTD</option>
                                                                        <option>Semi-Government/PSU-Government</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select style="width: 200px;" class="form-control">
                                                                        <option>Salaried</option>
                                                                        <option>Proprietor</option>
                                                                        <option>Partner</option>
                                                                        <option>Director</option>
                                                                        <option>Trustee</option>
                                                                        <option>Share Holder</option>
                                                                        <option>Professional</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- Start Income details -->
                                            <div class="form-row mt-5">
                                                <div class="col-12">
                                                    <h6 class="text-uppercase sub-catagory mb-4">Income Details</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>Buisness Income</th>
                                                                <th>Buisness 1</th>
                                                                <th>Buisness 2</th>
                                                                <th>Buisness 3</th>
                                                                <th>Buisness 4</th>
                                                                <th>Buisness 5</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-bold-500">Company Name</td>
                                                                <td>
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-500">Type of Business</td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Service</option>
                                                                        <option>Trading</option>
                                                                        <option>Manufacturing</option>
                                                                        <option>Any Other(Please specify)</option>
                                                                    </select>
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    <select class="form-control">
                                                                        <option>Service</option>
                                                                        <option>Trading</option>
                                                                        <option>Manufacturing</option>
                                                                        <option>Any Other(Please specify)</option>
                                                                    </select>
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    <select class="form-control">
                                                                        <option>Service</option>
                                                                        <option>Trading</option>
                                                                        <option>Manufacturing</option>
                                                                        <option>Any Other(Please specify)</option>
                                                                    </select>
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    <select class="form-control">
                                                                        <option>Service</option>
                                                                        <option>Trading</option>
                                                                        <option>Manufacturing</option>
                                                                        <option>Any Other(Please specify)</option>
                                                                    </select>
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    <select class="form-control">
                                                                        <option>Service</option>
                                                                        <option>Trading</option>
                                                                        <option>Manufacturing</option>
                                                                        <option>Any Other(Please specify)</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-bold-500">Current year lip Sale</td>
                                                                <td>
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td class=" text-bold-500">
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="text-bold-500">Current year lip Gross Margin</td>
                                                                <td>
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td class=" text-bold-500">
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    <div class="col mb-2">
                                                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Current Year</th>
                                                                <th>Previous Year</th>
                                                                <th>Current Year</th>
                                                                <th>Previous Year</th>
                                                                <th>Current Year</th>
                                                                <th>Previous Year</th>
                                                                <th>Current Year</th>
                                                                <th>Previous Year</th>
                                                                <th>Current Year</th>
                                                                <th>Previous Year</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Sales/Gross Reciept as per account</td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>Gross Profit</td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Net Profit</td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Depreciation (If any)</td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Stock in hand (If any)</td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Loans</td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Creditors </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Debtors</td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>3CB</td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>3CD</td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Profit And Loss</td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Balance Sheet</td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Depreciation Chart</td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>List Of Creditors</td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>List Od Debtors</td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>GST Return R1 For Last 12 Month</td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>GST Return 3B For Last 12 Month</td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>GST User ID</td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>GST Password</td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Business Video</td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Business PIC</td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- End Income details -->

                                            <!-- Start All Current/OD/CC Accounts -->

                                            <div class="form-row mt-5">
                                                <div class="col-12">
                                                    <h6 class="text-uppercase sub-catagory mb-4">ALL CURRENT/OD/CC ACCOUNTS</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>Business/Company Name</th>
                                                                <th>Account Number</th>
                                                                <th>Bank Name</th>
                                                                <th>Branch</th>
                                                                <th>Date Of Opening</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- End All Current/OD/CC Accounts -->

                                            <!-- Start Current/OD/CC -->
                                            <div class="form-row mt-5">
                                                <div class="col-12">
                                                    <h6 class="text-uppercase sub-catagory mb-4">CURRENT/OD/CC ACCOUNT</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>Business/Company Name</th>
                                                                <th>Last Four Digit Of Account Number</th>
                                                                <th>Bank Name</th>
                                                                <th>From</th>
                                                                <th>To</th>
                                                                <th>Upload PDF To Banking Folder</th>
                                                                <th>Password(IF Any)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- End Current/OD/OC -->

                                            <!-- Start All Loans in Company Name -->
                                            <div class="form-row mt-5">
                                                <div class="col-12">
                                                    <h6 class="text-uppercase sub-catagory mb-4">ALL LOANS IN COMPANY NAME</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>Business/Company name</th>
                                                                <th>Bank Name</th>
                                                                <th>Loan Type</th>
                                                                <th>Loan Account Number</th>
                                                                <th>Ownership</th>
                                                                <th>Sanctioned Amount</th>
                                                                <th>Current Balance</th>
                                                                <th>Amount Overdue</th>
                                                                <th>Rate of Interest</th>
                                                                <th>Repayment Tenure</th>
                                                                <th>EMI Amount</th>
                                                                <th>Date Of EMI</th>
                                                                <th>Date Opened</th>
                                                                <th>Date of last payment</th>
                                                                <th>Value of collateral if any</th>
                                                                <th>collateral Description</th>
                                                                <th>Bank account number for EMI debit</th>
                                                                <th>Other Penalties and chargs</th>
                                                                <th>Sanction Letter</th>
                                                                <th>SOA</th>
                                                                <th>Amortisation Schedule</th>
                                                                <th>NOC</th>
                                                                <th>Cancellation Letter</th>
                                                                <th>BT Required</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select style="width:200px;" class="form-control">
                                                                        <option>PL</option>
                                                                        <option>BL</option>
                                                                        <option>HL</option>
                                                                        <option>LAP</option>
                                                                        <option>OD</option>
                                                                        <option>DOD</option>
                                                                        <option>CC</option>
                                                                        <option>Pr.Loan</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select style="width: 200px;" class="form-control">
                                                                        <option>Individual</option>
                                                                        <option>Joint</option>
                                                                        <option>Gaurantor</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select style="width: 200px;" class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>PL</option>
                                                                        <option>BL</option>
                                                                        <option>HL</option>
                                                                        <option>LAP</option>
                                                                        <option>OD</option>
                                                                        <option>DOD</option>
                                                                        <option>CC</option>
                                                                        <option>Pr.Loan</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Individual</option>
                                                                        <option>Joint</option>
                                                                        <option>Gaurantor</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select style="width: 200px;" class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>PL</option>
                                                                        <option>BL</option>
                                                                        <option>HL</option>
                                                                        <option>LAP</option>
                                                                        <option>OD</option>
                                                                        <option>DOD</option>
                                                                        <option>CC</option>
                                                                        <option>Pr.Loan</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Individual</option>
                                                                        <option>Joint</option>
                                                                        <option>Gaurantor</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select style="width: 200px;" class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>PL</option>
                                                                        <option>BL</option>
                                                                        <option>HL</option>
                                                                        <option>LAP</option>
                                                                        <option>OD</option>
                                                                        <option>DOD</option>
                                                                        <option>CC</option>
                                                                        <option>Pr.Loan</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Individual</option>
                                                                        <option>Joint</option>
                                                                        <option>Gaurantor</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select style="width: 200px;" class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>Rental Income</th>
                                                                <th>Property 1</th>
                                                                <th>Property 2</th>
                                                                <th>Property 3</th>
                                                                <th>Property 4</th>
                                                                <th>Property 5</th>
                                                                <th>Property 6</th>
                                                                <th>Property 7</th>
                                                                <th>Property 8</th>
                                                                <th>Property 9</th>
                                                                <th>Property 10</th>
                                                                <th>Total</th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Property Address</td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>Total Rental</td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>Number Of Renties</td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>Rental Payment To Account</td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>Rental Payment In Cash</td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- End All Loans in Company Name -->

                                            <!--Start All Loans in Company Name -->
                                            <div class="form-row mt-5">
                                                <div class="col-12">
                                                    <h6 class="text-uppercase sub-catagory mb-4">All Loans in company name</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>Company Name</th>
                                                                <th>Designation</th>
                                                                <th>Monthly Gross Salary</th>
                                                                <th>Monthly Deduction</th>
                                                                <th>Monthly Net Salary</th>
                                                                <th>Average Monthly Incentive</th>
                                                                <th>Remark (if any)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- End All loans in Company Name -->

                                            <!-- Start Any Other Income Source -->
                                            <div class="form-row mt-5">
                                                <div class="col-12">
                                                    <h6 class="text-uppercase sub-catagory mb-4">Any Other income source</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>Source Name</th>
                                                                <th>Frequency</th>
                                                                <th>Average Amount</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Monthly</option>
                                                                        <option>Quaterly</option>
                                                                        <option>Half Yearly</option>
                                                                        <option>Yearly</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Monthly</option>
                                                                        <option>Quaterly</option>
                                                                        <option>Half Yearly</option>
                                                                        <option>Yearly</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Monthly</option>
                                                                        <option>Quaterly</option>
                                                                        <option>Half Yearly</option>
                                                                        <option>Yearly</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>Total</td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Monthly</option>
                                                                        <option>Quaterly</option>
                                                                        <option>Half Yearly</option>
                                                                        <option>Yearly</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- End Any Other Income Source -->

                                            <!-- Start ITR -->
                                            <div class="form-row mt-5">
                                                <div class="col-12">
                                                    <h6 class="text-uppercase sub-catagory mb-4">ITR</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>Match Ending Year</th>
                                                                <th>ITR</th>
                                                                <th>Computation</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <input type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <input type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <input type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>26 As For Current Year</td>
                                                                <td>
                                                                    <input type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="file" class="form-control" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- End ITR -->

                                            <!-- Start Net Worth Statement -->
                                            <div class="form-row mt-5">
                                                <div class="col-12">
                                                    <h6 class="text-uppercase sub-catagory mb-4"> Net Worth Statement</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>Address</th>
                                                                <th>Land Usage</th>
                                                                <th>Type of land</th>
                                                                <th>Property Description</th>
                                                                <th>Area (In SQ YRD)</th>
                                                                <th>Rate</th>
                                                                <th>Current market value</th>
                                                                <th>Occupancy Status</th>
                                                                <th>IDate/Year of Purchase</th>
                                                                <th>Purchase Price</th>
                                                                <th>Share</th>
                                                                <th>GLien (If any)</th>
                                                                <th>Title Document Type</th>
                                                                <th>Title Deed</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Residential</option>
                                                                        <option>Commercial</option>
                                                                        <option>Industrial</option>
                                                                        <option>Mixed land use (Please specify)</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Corporation</option>
                                                                        <option>Urban Authourity</option>
                                                                        <option>Housing Borad</option>
                                                                        <option>Society</option>
                                                                        <option>Builder</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Self Occupied</option>
                                                                        <option>Vacant</option>
                                                                        <option>Rented/Leased</option>
                                                                        <option>Any other (Please specify)</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Residential</option>
                                                                        <option>Commercial</option>
                                                                        <option>Industrial</option>
                                                                        <option>Mixed land use (Please specify)</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Corporation</option>
                                                                        <option>Urban Authourity</option>
                                                                        <option>Housing Borad</option>
                                                                        <option>Society</option>
                                                                        <option>Builder</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Self Occupied</option>
                                                                        <option>Vacant</option>
                                                                        <option>Rented/Leased</option>
                                                                        <option>Any other (Please specify)</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Residential</option>
                                                                        <option>Commercial</option>
                                                                        <option>Industrial</option>
                                                                        <option>Mixed land use (Please specify)</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Corporation</option>
                                                                        <option>Urban Authourity</option>
                                                                        <option>Housing Borad</option>
                                                                        <option>Society</option>
                                                                        <option>Builder</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>Self Occupied</option>
                                                                        <option>Vacant</option>
                                                                        <option>Rented/Leased</option>
                                                                        <option>Any other (Please specify)</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>Total</td>
                                                                <td>
                                                                    <select style="width: 200px;" class="form-control">
                                                                        <option>Residential</option>
                                                                        <option>Commercial</option>
                                                                        <option>Industrial</option>
                                                                        <option>Mixed land use (Please specify)</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select style="width: 200px;" class="form-control">
                                                                        <option>Corporation</option>
                                                                        <option>Urban Authourity</option>
                                                                        <option>Housing Borad</option>
                                                                        <option>Society</option>
                                                                        <option>Builder</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 200px;" class="form-control" type="text" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input style="width: 300px;" class="form-control" type="file" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- End Net Worth Statement -->

                                            <!-- Start Vehical -->
                                            <div class="form-row mt-5">
                                                <div class="col-12">
                                                    <h6 class="text-uppercase sub-catagory mb-4">Vehical</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>Model</th>
                                                                <th>Year Make</th>
                                                                <th>Current Market Price</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>Total</td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>


                                                            </tr>



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- End Vehical -->

                                            <!-- Start Gold -->
                                            <div class="form-row mt-5">
                                                <div class="col-12">
                                                    <h6 class="text-uppercase sub-catagory mb-4">Gold</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>Total Weight</th>
                                                                <th>Rate</th>
                                                                <th>Amount</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>Total</td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>


                                                            </tr>



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- End Gold -->

                                            <!-- Start Life Insurance -->
                                            <div class="form-row mt-5">
                                                <div class="col-12">
                                                    <h6 class="text-uppercase sub-catagory mb-4">Life Insurance</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>Company name</th>
                                                                <th>Yearly</th>
                                                                <th>Total Investments</th>
                                                                <th>Sum Assured</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>Total</td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>


                                                            </tr>



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- End Life Insurance -->

                                            <!-- Start Other Investments -->
                                            <div class="form-row mt-5">
                                                <div class="col-12">
                                                    <h6 class="text-uppercase sub-catagory mb-4">Other Investments</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>Type of paper Investments</th>
                                                                <th>Current Value</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>


                                                            </tr>

                                                            <tr>
                                                                <td>Total</td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>



                                                            </tr>



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- End Other Investments -->

                                            <!-- Start Business -->
                                            <div class="form-row mt-5">
                                                <div class="col-12">
                                                    <h6 class="text-uppercase sub-catagory mb-4">Business</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>Name Of Business</th>
                                                                <th>Current Total Share and its Value</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>


                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>


                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>


                                                            </tr>

                                                            <tr>
                                                                <td>Total</td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total Asset Value</td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total Value of Liability</td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Net Worth</td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- End Business -->

                                            <!-- Start  List of Additional  Document -->
                                            <div class="form-row mt-5">
                                                <div class="col-12">
                                                    <h6 class="text-uppercase sub-catagory mb-4">Other Investments</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>Additional Document Particulars</th>
                                                                <th>Folder Type</th>
                                                                <th>Upload Of Folder Type</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>KYC</option>
                                                                        <option>Financials</option>
                                                                        <option>Banking</option>
                                                                        <option>Loans</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>


                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>KYC</option>
                                                                        <option>Financials</option>
                                                                        <option>Banking</option>
                                                                        <option>Loans</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>


                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>KYC</option>
                                                                        <option>Financials</option>
                                                                        <option>Banking</option>
                                                                        <option>Loans</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>


                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>KYC</option>
                                                                        <option>Financials</option>
                                                                        <option>Banking</option>
                                                                        <option>Loans</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>


                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control">
                                                                        <option>KYC</option>
                                                                        <option>Financials</option>
                                                                        <option>Banking</option>
                                                                        <option>Loans</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" id="" placeholder="" name="">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- End List of Additional Document -->


                                        </form>
                                    </div>
                                </div>
                            </section>
                            <!-- // Basic multiple Column Form section end -->
                        </div>
                    </div>
                </section>
            </div>

            <?php include("./components/footer.php"); ?>
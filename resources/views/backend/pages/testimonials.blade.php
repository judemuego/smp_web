@extends('backend.master.index')
@section('content')
<div class="header">
    <h1 class="header-title">
        Testimonials
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard-default.html">Admin</a></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Testimonials</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Testimonials</h5>
                    <h6 class="card-subtitle text-muted"></h6>
                </div>
                <div class="card-body">
                    <table id="datatables-basic" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Message/Testimonials</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td class="table-action">
                                    <a href="#"><i class="align-middle fas fa-fw fa-plus"></i></i></a>
                                    <a href="#"><i class="align-middle fas fa-fw fa-pen"></i></i></a>
                                    <a href="#"><i class="align-middle fas fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td class="table-action">
                                    <a href="#"><i class="align-middle fas fa-fw fa-plus"></i></i></a>
                                    <a href="#"><i class="align-middle fas fa-fw fa-pen"></i></i></a>
                                    <a href="#"><i class="align-middle fas fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
                    
    @stop

    
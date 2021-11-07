@extends('backend.master.index')
@section('content')
<div class="header">
                <h1 class="header-title">
                    Projects
                </h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Project Maintenance Screen
                                <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#projectModal" style="float:right">
                                    Add Project
                                </button>
                            </h5>
                        </div>
                        @include('backend.partial.flash-message')
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatables" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Project Name</th>
                                                <th>Project Description</th>
                                                <th>Location</th>
                                                <th>Client</th>
                                                <th>Design Architect</th>
                                                <th>Scope</th>
                                                <th>Completed Date</th>
                                                <th>Size</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($projects as $key => $project)
                                                <tr>
                                                    <td>{{ ++$key}}</td>
                                                    <td>{{ $project->project_name}}</td>
                                                    <td>{{ $project->description}}</td>
                                                    <td>{{ $project->location}}</td>
                                                    <td>{{ $project->client}}</td>
                                                    <td>{{ $project->design_architect}}</td>
                                                    <td>{{ $project->scope}}</td>
                                                    <td>{{ $project->completed_date}}</td>
                                                    <td>{{ $project->size}}</td>
                                                    <td>{{ $project->category}}</td>
                                                    <td class="table-action">
                                                        <a href="#" class="align-middle fas fa-fw fa-pen edit" onclick="getDetails({{$project->id}})" title="Edit" data-toggle="modal" data-target="#projectModal"></a>
                                                        <a href="{{url('admin/project/destroy/' . $project->id)}}" onclick="alert('Are you sure you want to Delete?')"><i class="align-middle fas fa-fw fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- MODAL --}}
                    <div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Project</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body m-3">
                                    <form id="modal-form" action="{{url('admin/project/save')}}" method="post">
                                        @csrf
                                    <div class="form-group col-md-12">
                                        <label for="">Project Name</label>
                                        <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Project Name">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Description</label>
                                        <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Location</label>
                                        <input type="text" class="form-control" id="location" name="location" placeholder="Location">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Client</label>
                                        <input type="text" class="form-control" id="client" name="client" placeholder="Client">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Design Architect</label>
                                        <input type="text" class="form-control" id="design_architect" name="design_architect" placeholder="Design Architect">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Scope</label>
                                        <input type="text" class="form-control" id="scope" name="scope" placeholder="Scope">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Completed Date</label>
                                        <input type="text" class="form-control" id="completed_date" name="completed_date" placeholder="Completed Date">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Size</label>
                                        <input type="text" class="form-control" id="size" name="size" placeholder="Size">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Category</label>
                                        <input type="text" class="form-control" id="category" name="category" placeholder="Category">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary submit-button">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
    @stop

    @section('scripts')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        function edit(id){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/admin/project/edit/' + id,
                method: 'get',
                data: {

                },
                success: function(data) {
                    $('.modal-title').text('Update Project');
                    $('.submit-button').text('Update');
                        $.each(data, function() {
                            $.each(this, function(k, v) {
                                $('#'+k).val(v);
                            });
                        });
                    $('#modal-form').attr('action', '/admin/project/update/' + data.projects.id);
                }
            });

        }
        function getDetails(id) {
            event.preventDefault();
            edit(id);
            console.log('asd');
        }

        $(function() {
            $('#datatables').DataTable({
                responsive: true
            });


            $('.add').click(function(){
                $('.modal-title').text('Add Project');
                $('.submit-button').text('Add');
                $('#modal-form').attr('action', '/admin/project/save');

            })
        });
    </script>
@endsection
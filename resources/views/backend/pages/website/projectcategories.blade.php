@extends('backend.master.index')
@section('content')
<div class="header">
                <h1 class="header-title">
                    Project Categories
                </h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Project Categories Maintenance Screen
                                <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#projectcategoriesModal" style="float:right">
                                    Add Project Categories
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
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($projectcategories as $key => $projectcategory)
                                                <tr>
                                                    <td>{{ ++$key}}</td>
                                                    <td>{{ $projectcategory->name}}</td>
                                                    <td>{{ $projectcategory->description}}</td>
                                                
                                                    <td class="table-action">
                                                        <a href="#" class="align-middle fas fa-fw fa-pen edit" onclick="getDetails({{$projectcategory->id}})" title="Edit" data-toggle="modal" data-target="#projectcategoriesModal"></a>
                                                        <a href="{{url('admin/projectcategory/destroy/' . $projectcategory->id)}}" onclick="alert('Are you sure you want to Delete?')"><i class="align-middle fas fa-fw fa-trash"></i></a>
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

                    <div class="modal fade" id="projectcategoriesModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Project Categories</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body m-3">
                                    <form id="modal-form" action="{{url('admin/projectcategory/save')}}" method="post">
                                        @csrf
                                    <div class="form-group col-md-12">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Description</label>
                                        <input type="text" class="form-control" id="description" name="description" placeholder="Description">
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

                {{-- MODAL --}}
                    
                    
    @stop

    @section('scripts')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        function edit(id){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/admin/projectcategory/edit/' + id,
                method: 'get',
                data: {

                },
                success: function(data) {
                    $('.modal-title').text('Update Project Category');
                    $('.submit-button').text('Update');
                        $.each(data, function() {
                            $.each(this, function(k, v) {
                                $('#'+k).val(v);
                            });
                        });
                    $('#modal-form').attr('action', '/admin/projectcategory/update/' + data.projectcategories.id);
                }
            });

        }
        function getDetails(id) {
            event.preventDefault();
            edit(id);
        }

        $(function() {
            $('#datatables').DataTable({
                responsive: true
            });


            $('.add').click(function(){
                $('.modal-title').text('Add Project Category');
                $('.submit-button').text('Add');
                $('#modal-form').attr('action', '/admin/projectcategory/save');

            })
        });
    </script>
@endsection
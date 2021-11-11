@extends('backend.master.index')
@section('content')
<div class="header">
                <h1 class="header-title">
                    Sales Team
                </h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Sales Team Screen
                                <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#salesModal" style="float:right">
                                    Add Sales Agent
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
                                                <th>Position</th>
                                                <th>Contact No.</th>
                                                <th>Facebook Url</th>
                                                <th>Twitter Url</th>
                                                <th>Instagram Url</th>
                                                <th>Email</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sales as $key => $sale)
                                                <tr>
                                                    <td>{{ ++$key}}</td>
                                                    <td>{{ $sale->name}}</td>
                                                    <td>{{ $sale->position}}</td>
                                                    <td>{{ $sale->contact_no}}</td>
                                                    <td>{{ $sale->facebook_url}}</td>
                                                    <td>{{ $sale->twitter_url}}</td>
                                                    <td>{{ $sale->instagram_url}}</td>
                                                    <td>{{ $sale->email}}</td>
                                                    <td>{{ $sale->image}}</td>
                                                    <td class="table-action">
                                                        <a href="#" data-toggle="modal" data-target="#salesModal"><i class="align-middle fas fa-fw fa-file-image" ></i></a>
                                                        <a href="#" class="align-middle fas fa-fw fa-pen edit" onclick="getDetails({{$sale->id}})" title="Edit" data-toggle="modal" data-target="#salesModal"></a>
                                                        <a href="{{url('/admin/salesteam/destroy/' . $sale->id)}}" onclick="alert('Are you sure you want to Delete?')"><i class="align-middle fas fa-fw fa-trash"></i></a>
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

                {{-- PHOTOS MODAL --}}


                {{-- MODAL --}}
                    <div class="modal fade" id="salesModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Sales Agent</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body m-3">
                                    <form id="modal-form" action="{{url('/admin/salesteam/save')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    <div class="form-group col-md-12">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Position</label>
                                        <input type="text" class="form-control" id="position" name="position" placeholder="Position">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Contact No.</label>
                                        <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Contact No.">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Facebook Url</label>
                                        <input type="text" class="form-control" id="facebook_url" name="facebook_url" placeholder="Facebook Url">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Twitter Url</label>
                                        <input type="text" class="form-control" id="twitter_url" name="twitter_url" placeholder="Twitter Url">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Instagram Url</label>
                                        <input type="text" class="form-control" id="instagram_url" name="instagram_url" placeholder="Instagram Url">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Picture</label>
                                        <input type="file" class="form-control" id="picture" name="picture">
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
                url: '/admin/salesteam/edit/' + id,
                method: 'get',
                data: {

                },
                success: function(data) {
                    $('.modal-title').text('Update Sales Agent');
                    $('.submit-button').text('Update');
                        $.each(data, function() {
                            $.each(this, function(k, v) {
                                $('#'+k).val(v);
                            });
                        });
                    $('#modal-form').attr('action', '/admin/salesteam/update/' + data.sales.id);
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
                $('.modal-title').text('Add Sales Agent');
                $('.submit-button').text('Add');
                $('#modal-form').attr('action', '/admin/salesteam/save');

            })
        });
    </script>
@endsection
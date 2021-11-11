@extends('backend.master.index')
@section('content')
<div class="header">
                <h1 class="header-title">
                    Testimonials
                </h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Testimonial Maintenance Screen
                                <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#testimonialModal" style="float:right">
                                    Add Testimonial
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
                                                <th>Company</th>
                                                <th>Testimonial</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($testimonials as $key => $testimonial)
                                                <tr>
                                                    <td>{{ ++$key}}</td>
                                                    <td>{{ $testimonial->name}}</td>
                                                    <td>{{ $testimonial->company}}</td>
                                                    <td>{{ $testimonial->testimonial}}</td>
                                                
                                                    <td class="table-action">
                                                        <a href="#" class="align-middle fas fa-fw fa-pen edit" onclick="getDetails({{$testimonial->id}})" title="Edit" data-toggle="modal" data-target="#testimonialModal"></a>
                                                        <a href="{{url('admin/testimonial/destroy/' . $testimonial->id)}}" onclick="alert('Are you sure you want to Delete?')"><i class="align-middle fas fa-fw fa-trash"></i></a>
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
                    <div class="modal fade" id="testimonialModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Testimonial</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body m-3">
                                    <form id="modal-form" action="{{url('admin/testimonial/save')}}" method="post">
                                        @csrf
                                    <div class="form-group col-md-12">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Company</label>
                                        <input type="text" class="form-control" id="company" name="company" placeholder="Company">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Testimonial</label>
                                        <input type="text" class="form-control" id="testimonial" name="testimonial" placeholder="Testimonial">
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
                url: '/admin/testimonial/edit/' + id,
                method: 'get',
                data: {

                },
                success: function(data) {
                    $('.modal-title').text('Update Testimonial');
                    $('.submit-button').text('Update');
                        $.each(data, function() {
                            $.each(this, function(k, v) {
                                $('#'+k).val(v);
                            });
                        });
                    $('#modal-form').attr('action', '/admin/testimonial/update/' + data.testimonials.id);
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
                $('.modal-title').text('Add Testimonial');
                $('.submit-button').text('Add');
                $('#modal-form').attr('action', '/admin/testimonial/save');

            })
        });
    </script>
@endsection
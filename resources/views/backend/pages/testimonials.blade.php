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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#testimonialModal">
                        Add Testimonial
                    </button>
                    <div class="modal fade" id="testimonialModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title">Add Testimonial Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body m-3">
                    <form id="modal-form" action="{{url('testimonial/save')}}" method="post">
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Company Name</label>
                            <input type="text" id="company" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Message/Testimonial</label>
                            <textarea class="form-control" rows="2" ></textarea>
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary submit-button">Save</button>
                    </form>
                    </div>
                        </div>
                    </div>
                </div>
                    <h6 class="card-subtitle text-muted"></h6>
                </div>
                <div class="card-body">
                    <table id="datatables" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Message/Testimonials</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($testimonials as $key => $testimonial)
                            <tr>
                                <td>{{ $testimonial->id }}</td>
                                <td>{{ $testimonial->name }}</td>
                                <td>{{ $testimonial->company }}</td>
                                <td>{{ $testimonial->testimonial }}</td>
                                <td class="table-action">
                                    <a href="#" class="align-middle fas fa-fw fa-pen edit" title="Edit" data-toggle="modal" data-target="#testimonialModal" id={{$testimonial->id}}></a>
                                    <a href="{{url('testimonial/destroy/' . $testimonial->id)}}" onclick="alert('Are you sure you want to Delete?')"><i class="align-middle fas fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
                url: '/testimonial/edit/' + id,
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
                    $('#modal-form').attr('action', 'testimonial/update/' + data.testimonials.id);
                }
            });

        }

        $(function() {
            $('#datatables').DataTable({
                responsive: true
            });

            $( "table" ).on( "click", ".edit", function() {
                edit(this.id);
            });

            $('.add').click(function(){
                $('.modal-title').text('Add Testimonial');
                $('.submit-button').text('Add');
                $('#modal-form').attr('action', 'testimonial/save');

            })
        });
    </script>
    @endsection
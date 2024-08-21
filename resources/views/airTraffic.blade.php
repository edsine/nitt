@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')





<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




<div class="container mt-2">
    
    

<div class="container mt-2">
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    
    

   


    <div class="d-flex">
        <div class="mr-auto p-2"><div class="d-flex justify-content-start"><button id="add-record" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">Add</button></div></div>
        <div class="p-2"> <div class="d-flex justify-content-end"> <form action="{{ route('VehicleImportation.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file">

            <button type="submit" class="btn btn-secondary mr-2">Import</button>
           
        </form>


        <button type="button" class="btn btn-secondary" ><a href="{{ route('VehicleImportation.export') }}">Export</a></button>
    
    </div></div>
        
      </div>

    <table id="airTraffic-table" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>ID</th>
        <th>Year</th>
        <th>Domestic Passengers</th>
        <th>International Passengers</th>
        <th>Domestic Freight</th>
        <th>International Freight</th>
            </tr>
        </thead>
        <tbody>
            @foreach($traffics as $traffic)
            <tr>
                <td>{{ $traffic->id }}</td>
                <td>{{ $traffic->year }}</td>
                <td>{{ $traffic->domestic_passengers_traffic }}</td>
                <td>{{ $traffic->international_passengers_traffic }}</td>
                <td>{{ $traffic->domestic_freight_traffic}}</td>
                <td>{{ $traffic->international_freght_traffic }}</td>
                
                <td>
                    <button class="btn btn-warning btn-sm edit-record" data-id="{{ $traffic->id }}" data-toggle="modal" data-target="#editModal" data-record="{{ $traffic}}">Edit</button>
                    <button class="btn btn-danger btn-sm delete-record" data-id="{{ $traffic->id }}" data-toggle="modal" data-target="#deleteModal" data-record="{{ $traffic }}">Delete</button>
                    <button class="btn btn-info btn-sm view-chart" data-id="{{ $traffic->id }}" data-toggle="modal" data-target="#chartModal" data-record="{{ $traffic }}">View Chart</button> 
     
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="addForm" action="{{ route('airTrafficData.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="addYear">Year</label>
                        <input type="text" class="form-control" id="addYear" name="year" required>
                    </div>
                    <div class="form-group">
                        <label for="addDomesticPass">Domestic Passenger</label>
                        <input type="number" class="form-control" id="addDomesticPass" name="domestic_passengers_traffic" required>
                    </div>
                    <div class="form-group">
                        <label for="addInternationalPass">International Passenger</label>
                        <input type="number" class="form-control" id="addInternationalPass" name="international_passengers_traffic" required>
                    </div>
                    <div class="form-group">
                        <label for="addDomesticFreight">Domestic Freight</label>
                        <input type="number" class="form-control" id="addDomesticFreight" name="domestic_freight_traffic" required>
                    </div>
                    <div class="form-group">
                      <label for="addInternationalFreight">Internatioal Freight</label>
                      <input type="number" class="form-control" id="addInternationalFreight" name="international_freight_traffic" required>
                  </div>
                  <div class="form-group">
                 
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="editForm" action="{{ route('airTrafficData.update', '') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editId" name="id">
                    <div class="form-group">
                        <label for="editYear">Year</label>
                        <input type="text" class="form-control" id="editYear" name="year" required>
                    </div>
                    <div class="form-group">
                        <label for="editDomesticPass">Domestic Passenger</label>
                        <input type="text" class="form-control" id="editDomesticPass" name="domestic_passengers_traffic" required>
                    </div>
                    <div class="form-group">
                        <label for="editInternationalPass">International Passenger</label>
                        <input type="number" class="form-control" id="editInternationalPass" name="international_passengers_traffic" required>
                    </div>
                    <div class="form-group">
                        <label for="editDomesticFreight">Domestic Freight</label>
                        <input type="number" class="form-control" id="editDomesticFreight" name="domestic_freight_traffic" required>
                    </div>
                    <div class="form-group">
                      <label for="editInternationalFreight">International Freight</label>
                      <input type="number" class="form-control" id="editInternationalFreight" name="international_freight_traffic" required>
                  </div>
                  
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="deleteForm" action="{{ route('airTrafficData.destroy', '') }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this record?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#airTraffic-table').DataTable();

        // Handle Add button click
        $('#add-traffic').on('click', function() {
            $('#addModal').modal('show');
        });

        // Handle Edit button click
        $('.edit-traffic').on('click', function() {
            var airTraff = $(this).data('traffic');
            $('#editId').val(traffic.id);
            $('#editYear').val(traffic.year);
            $('#editDomesticPass').val(traffic.domestic_passengers_traffic);
            $('#editInternationalPass').val(traffic.international_passengers_traffic);
            $('#editDomesticFreight').val(traffic.domestic_freight_traffic);
            $('#editInternationalFreight').val(traffic.international_freight_traffic);
            $('#editForm').attr('action', '/airTraffic/' + traffic.id);
            $('#editModal').modal('show');
        });

        // Handle Delete button click
        $('.delete-traffic').on('click', function() {
            var traffic = $(this).data('traffic');
            $('#deleteForm').attr('action', '/airTraffic/' + traffic.id);
            $('#deleteModal').modal('show');
        });
    });
</script>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></>


@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js') 
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
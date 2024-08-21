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
        <div class="mr-auto p-2">
            <div class="d-flex justify-content-start">
                <button id="add-record" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">Add</button>
            </div>
        </div>
        <div class="p-2">
            <div class="d-flex justify-content-end">
                <form id="importForm" action="{{ route('VehicleImportation.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" id="fileInput">
                    <button type="submit" class="btn btn-secondary mr-2">Import</button>
                </form>
    
                <button type="button" class="btn btn-secondary">
                    <a href="{{ route('VehicleImportation.export') }}" style="color:white; text-decoration:none;">Export</a>
                </button>
            </div>
        </div>
    </div>
    
    <script>
        document.getElementById('importForm').addEventListener('submit', function(event) {
            const fileInput = document.getElementById('fileInput');
            
            if (!fileInput.value) {
                event.preventDefault(); // Prevent form submission
                alert('Please select a file before importing.');
            }
        });
    </script>
    




    <table id="stocks-table" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>ID</th>
              <th>Year</th>
              <th>No of Coaches</th>
              <th>No of Wagon</th>
              <th>Avg Loco Avalaible</th>
              <th>Coaches mentainance cost</th>
              <th>Wagon mentainance cost</th>
              <th>Avg Kilometer travel coaches</th>
              <th>Avg Kilometer travel Wagon</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach($stocks as $stock)
            <tr>
                <td>{{ $stock->id }}</td>
                <td>{{ $stock->year }}</td>
                <td>{{ $stock->number_of_passenger_carried }}</td>
                <td>{{ $stock->number_vehicle_in_fleet }}</td>
                <td>{{ $stock->revenue_from_operation }}</td>
                <td>{{ $stock->number_of_employees }}</td>
                <td>{{ $stock->annual_cost_of_vehicle_maintenance }}</td>
                <td>{{ $stock->number_of_accidents }}</td>
                <td>{{ $stock->number_of_accidents }}</td>
                <td>
                    <button class="btn btn-warning btn-sm edit-record" data-id="{{ $stocks->id }}" data-toggle="modal" data-target="#editModal" data-record="{{ $stocks }}">Edit</button>
                    <button class="btn btn-danger btn-sm delete-record" data-id="{{ $stocks->id }}" data-toggle="modal" data-target="#deleteModal" data-record="{{ $stocks }}">Delete</button>
                    <button class="btn btn-info btn-sm view-chart" data-id="{{ $stocks->id }}" data-toggle="modal" data-target="#chartModal" data-record="{{ $stocks }}">View Chart</button> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="addForm" action="{{ route('RailwayRollingStock.store') }}" method="POST">
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
                        <label for="addNumberOfPassengers">Number Of
                          Passengers</label>
                        <input type="number" class="form-control" id="addNumberOfPassengers" name="number_of_passenger_carried" required>
                    </div>
                    <div class="form-group">
                        <label for="addNumberOfVehicles">Number Of Vehicles</label>
                        <input type="number" class="form-control" id="addNumberOfVehicles" name="number_vehicle_in_fleet" required>
                    </div>
                    <div class="form-group">
                        <label for="addRevenue">Revenue</label>
                        <input type="number" class="form-control" id="addRevenue" name="revenue_from_operation" required>
                    </div>
                    <div class="form-group">
                      <label for="addEmployees">Employees</label>
                      <input type="number" class="form-control" id="addEmployees" name="number_of_employees" required>
                  </div>
                  <div class="form-group">
                    <label for="addCost">Annual Cost</label>
                    <input type="number" class="form-control" id="addCost" name="annual_cost_of_vehicle_maintenance" required>
                </div>
                <div class="form-group">
                  <label for="addAccident">Accidents</label>
                  <input type="number" class="form-control" id="addAccident" name="number_of_accidents" required>
              </div>
                </div>
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
        <form id="editForm" action="{{ route('RailwayRollingStock.update', '') }}" method="POST">
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
                        <label for="editNumberOfPassengers">Passengers</label>
                        <input type="text" class="form-control" id="editNumberOfPassengers" name="number_of_passenger_carried" required>
                    </div>
                    <div class="form-group">
                        <label for="editVehicles">Vehicles</label>
                        <input type="number" class="form-control" id="editVehicles" name="number_of_vehicle_in_fleet" required>
                    </div>
                    <div class="form-group">
                        <label for="editRevenue">Revenue</label>
                        <input type="number" class="form-control" id="editRevenue" name="revenue_from_operation" required>
                    </div>
                    <div class="form-group">
                      <label for="editEmployees">Employees</label>
                      <input type="number" class="form-control" id="editEmployees" name="number_of_employees" required>
                  </div>
                  <div class="form-group">
                    <label for="editCost">Cost</label>
                    <input type="number" class="form-control" id="editCost" name="annual_cost_of_vehicle_maintenance" required>
                </div>
                <div class="form-group">
                  <label for="editAccidents">Accidents</label>
                  <input type="number" class="form-control" id="editAccidents" name="number_accidents" required>
              </div>
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
        <form id="deleteForm" action="{{ route('RailwayRollingStock.destroy', '') }}" method="POST">
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
        $('#stocks-table').DataTable();

        // Handle Add button click
        $('#add-stock').on('click', function() {
            $('#addModal').modal('show');
        });

        // Handle Edit button click
        $('.edit-stock').on('click', function() {
            var stock = $(this).data('stock');
            $('#editId').val(stock.id);
            $('#editYear').val(stock.year);
            $('#editNumberOfPassengers').val(stock.number_of_passenger_carried);
            $('#editVehicles').val(stock.number_of_vehicle_in_fleet);
            $('#editRevenue').val(stock.revenue_from_operation);
            $('#editEmployees').val(stock.number_of_employees);
            $('#editCost').val(stock.annual_cost_of_vehicle_maintenance);
            $('#editAccidents').val(stock.number_of_accidents);
            $('#editForm').attr('action', '/rollingStock/' + stock.id);
            $('#editModal').modal('show');
        });

        // Handle Delete button click
        $('.delete-stock').on('click', function() {
            var record = $(this).data('stock');
            $('#deleteForm').attr('action', '/rollingStock/' + stock.id);
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
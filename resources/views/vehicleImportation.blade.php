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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>




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
    




    
    <table id="vehicles-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Year</th>
                <th>Govt Motor Vehicle</th>
                <th>Govt Articulated</th>
                <th>Private Motor Vehicle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
            <tr>
                <td>{{ $record->id }}</td>
                <td>{{ $record->year }}</td>
                <td>{{ $record->vehicle_category }}</td>
                <td>{{ $record->new_vehicle_count }}</td>
                <td>{{ $record->used_vehicle_count }}</td>
                <td>
                    <button class="btn btn-warning btn-sm edit-record" data-id="{{ $record->id }}" data-toggle="modal" data-target="#editModal" data-record="{{ $record }}">Edit</button>
                    <button class="btn btn-danger btn-sm delete-record" data-id="{{ $record->id }}" data-toggle="modal" data-target="#deleteModal" data-record="{{ $record }}">Delete</button>
                    <button class="btn btn-info btn-sm view-chart" data-id="{{ $record->id }}" data-toggle="modal" data-target="#chartModal" data-record="{{ $record }}">View Chart</button> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="addForm" action="{{ route('vehicleImportation.store') }}" method="POST">
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
                        <label for="addVehicleCategory">Vehicle Category</label>
                        <input type="text" class="form-control" id="addVehicleCategory" name="vehicle_category" required>
                    </div>
                    <div class="form-group">
                        <label for="addNewVehicleCount">New Vehicle Count</label>
                        <input type="number" class="form-control" id="addNewVehicleCount" name="new_vehicle_count" required>
                    </div>
                    <div class="form-group">
                        <label for="addUsedVehicleCount">Used Vehicle Count</label>
                        <input type="number" class="form-control" id="addUsedVehicleCount" name="used_vehicle_count" required>
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
        <form id="editForm" action="{{ route('vehicleImportation.update', '') }}" method="POST">
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
                        <label for="editVehicleCategory">Vehicle Category</label>
                        <input type="text" class="form-control" id="editVehicleCategory" name="vehicle_category" required>
                    </div>
                    <div class="form-group">
                        <label for="editNewVehicleCount">New Vehicle Count</label>
                        <input type="number" class="form-control" id="editNewVehicleCount" name="new_vehicle_count" required>
                    </div>
                    <div class="form-group">
                        <label for="editUsedVehicleCount">Used Vehicle Count</label>
                        <input type="number" class="form-control" id="editUsedVehicleCount" name="used_vehicle_count" required>
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
        <form id="deleteForm" action="{{ route('vehicleImportation.destroy', '') }}" method="POST">
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



<!-- Chart Modal -->
<div class="modal fade" id="chartModal" tabindex="-1" role="dialog" aria-labelledby="chartModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chartModalLabel">Vehicle Count Chart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <canvas id="vehicleChart"></canvas>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<script>

    
    $(document).ready(function() {
        $('#vehicles-table').DataTable();

        // Handle Add button click
        $('#add-record').on('click', function() {
            $('#addModal').modal('show');
        });

        // Handle Edit button click
        $('.edit-record').on('click', function() {
            var record = $(this).data('record');
            $('#editId').val(record.id);
            $('#editYear').val(record.year);
            $('#editVehicleCategory').val(record.vehicle_category);
            $('#editNewVehicleCount').val(record.new_vehicle_count);
            $('#editUsedVehicleCount').val(record.used_vehicle_count);
            $('#editForm').attr('action', '/vehicleImportation/' + record.id);
            $('#editModal').modal('show');
        });

        // Handle Delete button click
        $('.delete-record').on('click', function() {
            var record = $(this).data('record');
            $('#deleteForm').attr('action', '/vehicleImportation/' + record.id);
            $('#deleteModal').modal('show');
        });


        // Chart instance variable
        var vehicleChart = null;

        // Handle View Chart button click
        $('.view-chart').on('click', function() {
            var recordId = $(this).data('id');
            $.ajax({
                url: '/vehicleImportation/' + recordId + '/data',
                method: 'GET',
                success: function(data) {
                    var ctx = document.getElementById('vehicleChart').getContext('2d');
                    
                    // Destroy existing chart if it exists
                    if (vehicleChart) {
                        vehicleChart.destroy();
                    }

                    // Create the chart
                    vehicleChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Govt Vehicles', 'Private Vehicles'],
                            datasets: [{
                                label: 'Vehicle Counts',
                                data: [data.new_vehicle_count, data.used_vehicle_count],
                                backgroundColor: ['#36a2eb', '#ff6384']
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                    
                    // Show the modal
                    $('#chartModal').modal('show');
                },
                error: function() {
                    alert('Error fetching data');
                }
            });
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

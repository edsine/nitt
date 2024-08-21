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




<br/>
<div class="container-fluid">
    <div id="errorBox"></div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h5>List</h5>
            </div>
            <a class="float-right btn btn-primary btn-xs m-0" href="{{route('users.roles.create')}}"><i class="fas fa-plus"></i> Add</a>
        </div>
        <div class="card-body">
            <!--DataTable-->
            <div class="table-responsive">
                <table id="tblData" class="table table-bordered table-striped dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Users</th>
                            <th>Permission</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
 <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
 $.ajaxSetup({
     headers:{
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 })
 $(document).ready(function(){
     var table = $('#tblData').DataTable({
         reponsive:true, processing:true, serverSide:true, autoWidth:false, 
         ajax:"{{route('users.roles.index')}}", 
         columns:[
             {data:'id', name:'id'},
             {data:'name', name:'name'},
             {data:'users_count', name:'users_count', className:"text-center"},
             {data:'permissions_count', name:'permissions_count', className:"text-center"},
             {data:'action', name:'action', bSortable:false, className:"text-center"},
         ], 
         order:[[0, "desc"]], 
         bDestory:true,
     });
     $('body').on('click', '#btnDel', function(){
         //confirmation
         var id = $(this).data('id');
         if(confirm('Delete Data '+id+'?')==true)
         {
             var route = "{{route('users.roles.destroy', ':id')}}"; 
             route = route.replace(':id', id);
             $.ajax({
                 url:route, 
                 type:"delete", 
                 success:function(res){
                     console.log(res);
                     $("#tblData").DataTable().ajax.reload();
                 },
                 error:function(res){
                     $('#errorBox').html('<div class="alert alert-dander">'+response.message+'</div>');
                 }
             });
         }else{
             //do nothing
         }
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
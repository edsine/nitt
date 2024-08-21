@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')

<br/>

<div class="container-fluid">
    <div id="errorBox"></div>
    <form action="{{route('users.roles.update', $role->id)}}" method="POST">
        @method('patch')
        @csrf
        <div class="card">                
            <div class="card-body">
                <div class="form-group">
                    <label for="name" class="form-label"> Name <span class="text-danger"> *</span></label>
                    <input type="text" name="name" class="form-control" placeholder="For e.g. Manager" value={{ucfirst($role->name)}}>
                    @if($errors->has('name'))
                        <span class="text-danger">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <label for="name" class="form-label"> Assign Permissions <span class="text-danger"> *</span></label>
                <!--DataTable-->
                <div class="table-responsive">
                    <table id="tblData" class="table table-bordered table-striped dataTable dtr-inline">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="all_permission" name="all_permission">
                                </th>
                                <th>Name</th>
                                <th>Guard</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save Role</button>
            </div>
        </div>
    </form>
</div>






@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js') 
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
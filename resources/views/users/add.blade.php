@extends('users.layout')
@section('content')
<br><br>
<div class="card">
    <div class="card-header">
        <h4>Add Users</h4>
    </div>
<div class="card-body">
    <form action="{{url('insert-user')}}" method="POST">
        @csrf
        <div class="row">
        <div class="col-md-6 mb-3">
                <label for="">Name</label>
                <input type="text" class="form-control"  required name="name">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Phone Number</label>
                <input type="text" class="form-control" required name="phone_number">
            </div>

           <div class="col-md-6 mb-3">
           <label for="">Department</label>
           <select class="form-control" name="department_id" required>
            <option value="">Select a  Department</option>
             @foreach($department as $item)
             <option value="{{$item->id}}">{{$item->name}}</option>
             @endforeach
           
            </select>
            </div>
           
            <div class="col-md-6 mb-3">
            <label for="">Designation</label>
           <select class="form-control" name="designation_id" required>
            <option value="">Select a Designation</option>
             @foreach($designation as $item)
             <option value="{{$item->id}}">{{$item->name}}</option>
             @endforeach
           
            </select>
            </div>
           
           
          
            <div class="col-md-12">
             <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection
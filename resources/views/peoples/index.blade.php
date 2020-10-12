@extends('peoples.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Check all peoples</h2>
        </div>
        <div class="pull-right mb-2">
            <a class="btn btn-success" href="{{ route('create') }}"> Create new peoples</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>

        <th>Name</th>
        <th>Mobile Number</th>
        <th>Email</th>
        <th>Description</th>
        <th width="250px">Action</th>
    </tr>

    @foreach ($peoples as $people)
    <tr>

        <td>{{ $people->name }}</td>
        <td>{{ $people->mobile_number }}</td>
        <td>{{ $people->email }}</td>
        <td>{{ $people->description }}</td>
        <td>
            <form action="{{ route('peoples.destroy',$people->id) }}" method="POST">

                <a class="btn btn-primary" href="{{ route('peoples.edit',$people->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>




@endsection
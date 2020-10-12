<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">

                <div class="row ">
                    <div class="col-lg-12 margin-tb ">
                        <div class="pull-left">
                            <h2>Check all Entries</h2>
                        </div>
                        <div class="pull-right mb-3">
                            <a class="btn btn-success" href="{{ route('create') }}"> Create new Entry</a>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <table class="table table-bordered p-3">
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

            </div>
        </div>
    </div>
</x-app-layout>
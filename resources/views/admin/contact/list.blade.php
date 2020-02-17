@extends('admin.layout')
@section('title', 'List Contact')

@section('content')
    <form class="form-group float-right"
          action="#"
          method="get">
        <div class="input-group">
            <input type="text"
                   id="search-product"
                   class="form-control bg-light border-bottom"
                   placeholder="Search for..."
                   name="keyword">
            <div class="input-group-append">
                <button class="btn btn-primary"
                        type="submit">
                    search
                </button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>No#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Avatar</th>
                </tr>
                </thead>
                <tbody>
                @forelse($contacts as $key => $contact)
                    <tr>
                        <th class="pt-5">{{++$key}}</th>
                        <td class="pt-5">{{$contact->firstName . ' ' . $contact->lastName}}</td>
                        <td class="pt-5">{{$contact->email}}</td>
                        <td class="pt-5">{{$contact->phone}}</td>
                        <td><img style="width: 200px" src="{{asset('public'. $contact->image)}}"></td>
                        <td class="pt-5">
                            <a href="{{route('contact.show', $contact->id)}}" class="btn btn-info">Show</a>
                            <a href="{{route('contact.destroy', $contact->id)}}" class="btn btn-danger"
                               onclick="return confirm('Delete this contact?')">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="6">No data</th>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <div class="col-6 float-left">
                <a href="{{route('contact.create')}}" class="btn btn-success">Add New Product</a>
            </div>
            <div class="col-6 float-left">
                <div class="pagination float-right mr-4">
                    {{$contacts->links()}}
                </div>
            </div>

        </div>
    </div>
@endsection

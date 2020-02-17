@extends('admin.layout')
@section('title', 'Create new contacts')
@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{route('contact.store')}}" method="POST" class="form-group" enctype="multipart/form-data">
                @csrf
                <div class="mt-3">
                    <label>First name: </label>
                    <input type="text"
                           name="firstName"
                           id="firstName"
                           class="form-control @if($errors->has('firstName')) border-danger @endif"
                           placeholder="First Name">
                    @if($errors->has('firstName'))
                        <p class="text-danger">
                            {{$errors->first('firstName')}}
                        </p>
                    @endif
                </div>
                <div class="mt-3">
                    <label>Last name: </label>
                    <input type="text"
                           name="lastName"
                           id="lastName"
                           class="form-control @if($errors->has('lastName')) border-danger @endif"
                           placeholder="Last Name">
                    @if($errors->has('lastName'))
                        <p class="text-danger">
                            {{$errors->first('lastName')}}
                        </p>
                    @endif
                </div>
                <div class="mt-3">
                    <label>Email: </label>
                    <textarea name="email"
                              rows="3"
                              class="form-control @if($errors->has('email')) border-danger @endif"
                              placeholder="Input contact email"></textarea>
                    @if($errors->has('email'))
                        <p class="text-danger">
                            {{$errors->first('email')}}
                        </p>
                    @endif
                </div>
                <div class="mt-3">
                    <label>Phone: </label>
                    <input type="text"
                           name="phone"
                           id="phone"
                           class="form-control @if($errors->has('phone')) border-danger @endif"
                           placeholder="Phone number">
                    @if($errors->has('phone'))
                        <p class="text-danger">
                            {{$errors->first('phone')}}
                        </p>
                    @endif
                </div>
                <div class="mt-3">
                    <label>Address: </label>
                    <input type="text"
                           name="address"
                           id="address"
                           class="form-control @if($errors->has('address')) border-danger @endif"
                           placeholder="Address">
                    @if($errors->has('address'))
                        <p class="text-danger">
                            {{$errors->first('address')}}
                        </p>
                    @endif
                </div>
                <div class="mt-3">
                    <label>Image: </label>
                    <input type="file"
                           name="image"
                           id="name"
                           class="form-control @if($errors->has('image')) border-danger @endif">
                    @if($errors->has('image'))
                        <p class="text-danger">
                            {{$errors->first('image')}}
                        </p>
                    @endif
                </div>
                <div class="mt-3">
                    <input type="submit"
                           value="Create"
                           class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection


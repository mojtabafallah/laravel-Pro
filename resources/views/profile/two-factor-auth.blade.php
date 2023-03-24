@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @include('profile.inc.header')
                    <div class="card-body">
                        <h4>Tow factor</h4>
                        <hr>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{route('handelTwoFactor')}}">
                            @csrf
                            <div class="row mb-4">
                                <div class="col">
                                    <label for="type" class="form-label">Type</label>
                                    <select name="type" id="type" class="form-select">
                                        @foreach(config('twofactor.types') as $key => $type)
                                            <option {{ old('type') == $key || auth()->user()->hasTwoFactor($key)  ? 'selected' : '' }} value="{{$key}}">{{$type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                           placeholder="Please Enter Phone..."
                                           value="{{ old('phone') ?? auth()->user()->phone_number}}">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col">
                                    <button class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

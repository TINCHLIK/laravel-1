@extends('layouts.app')
@section('content')
    <h1 class="text-center font-monospace text-success fw-bold">Bu create sahifa</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="" method="post" action="{{route('student.store')}}">
                @csrf
                @include('students.form')
                <div class="form-group mb-3">
                    <label for='profession'>Profession</label>
                    <select class="form-control mt-2" id='profession' name='profession_id'>
                        @foreach($professions as $profession)
                            <option
                                {{ old('profession_id') == $profession->id ? 'selected' : ''}}
                                value="{{$profession->id}}">{{$profession->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select multiple name="tags[]" id="tags" class="form-control">
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->title}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="mt-3 btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

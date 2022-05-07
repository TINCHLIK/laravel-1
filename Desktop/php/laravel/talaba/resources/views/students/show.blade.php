@extends('layouts.app')
@section('content')
    <h1 class="text-center font-monospace text-success fw-bold">Bu Show Sahifa</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="mb-3">
                <a href="{{route('student.index')}}">Back</a>
            </div>
           <table class="table table-bordered">
               <tr>
                   <th>Ismi</th>
                   <td>{{$student->ism}}</td>
               </tr>
               <tr>
                    <th>Familiya</th>
                    <td>{{$student->fam}}</td>
                </tr>
                <tr>
                    <th>Yosh</th>
                    <td>{{$student->yosh}}</td>
                </tr>
                <tr>
                    <th>Jins</th>
                    <td>{{$student->jins}}</td>
                </tr>
                <tr>
                    <th>Qachon bazaga qo'shilgan </th>
                    <td>{{$student->created_at}}</td>
                </tr>

           </table>
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('content')
<div class="mt-2 d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="{{route('student.create')}}">
        <button class="btn btn-primary" type="buton">Add Student</button>
    </a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Ism</th>
            <th>Fam</th>
            <th>Yosh</th>
            <th>Jins</th>
            <th>Amallar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{(($students->currentpage()-1)*$students->perpage() + ($loop->index + 1))}}</td>
            <td>
                <a href="{{route('student.show', ['student'=>$student->id])}}">
                    {{$student->ism}}
                </a>
            </td>
            <td>{{$student->fam}}</td>
            <td>{{$student->yosh}}</td>
            <td>{{$student->jins}}</td>
            <td class="d-flex">
                <a href="{{route('student.edit',['student'=>$student->id])}}" class="btn btn-info"> <i class="bi bi-pencil-square"></i> </a>
                <form class="btn" action="{{route('student.destroy', ['student'=>$student->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bn btn-danger"> <i class="bi bi-trash"></i>  </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$students->links()}}
@endsection

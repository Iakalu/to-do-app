@extends('layouts.app')

@section('title', 'To-do-app')
@section('content')
    <h1>To Do App</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            {{-- <th>Description</th>
            <th>Long Description</th> --}}
            <th>Status</th>
            <th>Action</th>
        </tr>
            @if (count($tasks)>0)
                @foreach ($tasks as $task )
                <tr>
                <!--Phan tu cua 1 list -->
                    <td>{{$task->id}}</td>
                    <td>{{$task->title}}</td>
                    {{-- <td>{{$task->description}}</td>
                    <td>{{$task->long_description}}</td> --}}
                    <td>{{$task->completed==true?"Completed":"Uncompleted"}}</td>
                    <td><a href="{{route('tasks.detail',['id'=>$task->id])}}">Detail</td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">No task found</td>
                </tr>
            @endif
    </table>
@endsection

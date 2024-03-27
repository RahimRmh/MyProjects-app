@extends('layouts.app')
@section('content')
<header class="header">
    <div class="header__left">
        <h6 class="header__title">
            <a href="/projects">{{ $project->title }}/المشاريع</a>
        </h6>
    </div>
    <div class="header__right">
        <a href="/projects/{{$project->id}}/edit" class="btn btn-primary">تعديل المشروع</a>
    </div>
</header>

<section class="main-section" dir="rtl">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="status">
                        @switch($project->status)
                            @case(1)
                                <span class="text-success">مكتمل</span>
                                @break
                            @case(2)
                                <span class="text-danger">ملغي</span>
                                @break
                            @default
                                <span class="text-warning">قيد الانجاز</span>
                        @endswitch
                        <h5 class="font-weight-bold card-title">
                            <a href="/projects/{{$project->id}}">{{$project->title}}</a>
                        </h5>
                        <div class="card-text my-4">
                            {{$project->description}}
                        </div>
                        @include('projects.footer')
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="/projects/{{$project->id}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="custom-select" onchange="this.form.submit()">
                            <option value="0" {{ $project->status == 0 ? 'selected' : '' }}>قيد الانجاز</option>
                            <option value="1" {{ $project->status == 1 ? 'selected' : '' }}>مكتمل</option>
                            <option value="2" {{ $project->status == 2 ? 'selected' : '' }}>ملغي</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            @foreach($project->tasks as $task)
                <div class="card p-3 mb-3 d-flex flex-row align-items-center">
                    <div class="{{ $task->done ? 'checked text-muted' : '' }}">
                        {{$task->body}}
                    </div>
                    <div class="d-flex mr-auto">
                        <form action="/projects/{{$project->id}}/tasks/{{$task->id}}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="checkbox" name="done" {{$task->done ? 'checked' : ''}} onchange="this.form.submit()">
                        </form>
                        <div class="d-flex align-items-center mr-auto">
                            <form action="/projects/{{$task->project_id}}/tasks/{{$task->id}}" method="POST" class="hide-submit">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-delete mt-1">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="card">
                <form action="/projects/{{$project->id}}/tasks" method="post" class="p-3 d-flex">
                    @csrf
                    <input type="text" name="body" class="form-control p-2 ml-2" placeholder="اضف مهمة جديدة">
                    <button type="submit" class="btn btn-primary">اضافة</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@extends('layouts.app')

@section('title', $student->first_name . ' ' . $student->last_name)

@section('content')
<section class="card">
    <div class="toolbar">
        <h1>{{ $student->first_name }} {{ $student->last_name }}</h1>
        <a class="button" href="/students/{{ $student->id }}/edit">Edit student</a>
    </div>

    <dl>
        @foreach(['student_number' => 'Student number', 'email' => 'Email', 'course' => 'Course', 'year_level' => 'Year level'] as $field => $label)
            <dt>{{ $label }}</dt>
            <dd>{{ $student->$field }}</dd>
        @endforeach
    </dl>

    <div class="actions">
        <a class="button secondary" href="/students">Back to students</a>
        <form method="post" action="/students/{{ $student->id }}" onsubmit="return confirm('Delete this student record? This cannot be undone.')">
            @csrf
            @method('DELETE')
            <button class="danger">Delete student</button>
        </form>
    </div>
</section>
@endsection
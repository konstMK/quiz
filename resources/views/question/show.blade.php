@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('save_answer', ['id' => $question->id])}}" method="post">
            @csrf
        <h2>{{$question->question}}</h2>
        <p>
            @foreach ($question->answers as $answer)
            <p>
            @if ($answer->type == 1)
                <label for="answer_{{$answer->id}}">
                <input id="answer_{{$answer->id}}" name="question_{{$question->id}}[]" type="checkbox">{{$answer->answer}}</input>
            @elseif ($answer->type == 2)
                <label for="answer_{{$answer->id}}">
                <input id="answer_{{$answer->id}}" name="question[][{{$answer->id}}]" type="radio">{{$answer->answer}}</input>
            @endif
            </p>
            @endforeach
        </p>
            <input type="submit" value="Send answers"/>
        </form>
    </div>
@endsection
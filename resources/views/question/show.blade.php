@extends('layouts.app')

@section('content')
    <div class="container">
        <form id="quiz" action="" method="post">
            @csrf
        <h2>{{$question->question}}</h2>
        <p>
            @foreach ($answers as $answer)
            <p>
            @if ($answer->type == 1)
                    <input name="choice" type="checkbox" value="{{$answer->id}}"/>{{$answer->answer}}
            @elseif ($answer->type == 2)
                    <input name="choice" type="radio"  value="{{$answer->id}}"/><div id="answer_{{$answer->id}}">{{$answer->answer}}</div>
            @endif
                <input type="hidden"  name="question_id" value="{{$question->id}}"/>
            </p>
            @endforeach
        </p>
            <input type="submit" id="send" value="Send answers"/>
            <a href="{{route('get_question', ['id' => $question->id + 1])}}">Next</a>
        </form>
    </div>
@endsection

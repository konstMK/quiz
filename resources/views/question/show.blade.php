@extends('layouts.app')

@section('content')
    <div class="container">
        <form id="quiz" action="" method="post">
            @csrf
        <h2>{{$question->question}}</h2>
        <p>
            @foreach ($question->answers as $answer)
            <p>
            @if ($answer->type == 1)
                    <input name="choice" type="checkbox" value="{{$answer->id}}"/>{{$answer->answer}}
            @elseif ($answer->type == 2)
                    <input name="choice" type="radio" value="{{$answer->id}}"/>{{$answer->answer}}
            @endif
                <input type="hidden"  value="{{$question->id}}"/>
            </p>
            @endforeach
        </p>
            <input type="submit" id="send" value="Send answers"/>
        </form>
    </div>
@endsection

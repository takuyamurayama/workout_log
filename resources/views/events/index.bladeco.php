@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12 text-center">
            <a href="{{ url('events/create') }}" class="btn btn-outline-success">種目を追加する</a>
        </div>
        <div class="row">
            @if (isset($all_events))
                @foreach ($all_events as $event)
                    <div class="col-12 col-md-8">
                        <div class="card">
                            <div class="card-haeder p-3 w-100 d-flex">
                                <div class="ml-2 d-flex flex-column">
                                    <form method="POST" action="{{ route('event_select') }}">
                                        @csrf
                                        <label for="enent_name" text-align="center">{{ $event->part }} : {{ $event->event_name }}
                                            <input type="checkbox" name="events[]" value="{{ $event->id }}" id="event_name">
                                        </label>
                                    </form>
                                    <form method="POST" action="{{ url('events/' .$event->id) }}">
                                        @csrf
                                        @method('DELETE')

                                        <input type="hidden" value="{{ $event->id }}">
                                        <button type="submit" class="btn btn-success btn-sm">削除</button>
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <div class="form-group row mb-0">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-success">
                                トレログ！！
                            </button>
                        </div>
                    </div>
            @endif      
        </div>
    </div>
@endsection
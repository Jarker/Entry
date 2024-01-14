@extends('entry-code::layout')

@section('content')
    <p class="mb-6">Your entry code was correct.</p>
    <a class="bg-zinc-800 text-zinc-50 text-sm p-2 px-3 rounded" href="{{ route('entry-code.authenticate') }}">Next user</a>
@endsection

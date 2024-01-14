@extends('entry-code::layout')

@section('content')
    <p class="mb-6">Enter your entry code to continue.</p>
    <form action="{{ route('entry-code.authenticate.post') }}" method="post">
        @csrf
        <input class="border border-zinc-400 p-1 px-3 rounded" type="text" name="code" required />
        <button class="bg-zinc-800 text-zinc-50 mx-2 text-sm p-2 px-3 rounded" type="submit">Submit</button>
        @if($errors->has('code'))
            <small class="block text-red-400 my-2">{{ $errors->first('code') }}</small>
        @endif
    </form>
@endsection

<h1>Entry code</h1>
<p>Entry your entry code to continue.</p>
<form action="{{ route('entry-code.authenticate.post') }}" method="post">
    @csrf
    <input type="text" name="code" required />
    <button type="submit">Submit</button>
    @if($errors->has('code'))
        <small style="display: block; margin-top: 3px; color: red;">{{ $errors->first('code') }}</small>
    @endif
</form>

@extends('entry-code::layout')

@section('content')
    @if ($codes)
        <table class="table-fixed w-full border border-gray-100 rounded">
            <thead>
                <tr class="bg-gray-50">
                    <th class="p-2">Code</th>
                    <th class="p-2">Allocated User</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($codes as $code)
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="p-2">{{ $code->code }}</td>
                        <td class="p-2 flex items-center space-x-2">
                            <select class="border rounded p-2">
                                @if ($code->user)
                                    <option value="{{ $code->user->id }}">{{ $code->user->name }}</option>
                                @endif
                                <option>Unallocated</option>
                                @foreach ($users as $user)
                                    @if ($code->user && $user->id === $code->user->id)
                                        @continue
                                    @endif
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <button class="bg-zinc-800 text-zinc-50 mx-2 text-sm p-2 px-3 rounded" type="submit">Update</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-2">
            {{ $codes->links() }}
        </div>
    @else
        No codes exist. Click Generate in order to generate an entry code.
    @endif

    <div class="ml-auto my-2">
        <span class="font-bold">Total Unallocated:</span> {{ $unallocatedTotal }}
    </div>
@endsection

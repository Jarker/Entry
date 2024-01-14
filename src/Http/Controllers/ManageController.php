<?php
namespace Jarker\Entry\Http\Controllers;

class ManageController extends \Illuminate\Routing\Controller
{
    private const RESULTS_PER_PAGE = 15;

    public function __construct(
        private readonly \Jarker\Entry\Models\EntryCode $entryCode,
        private readonly \App\Models\User $user
    ) {}

    public function get()
    {
        return view('entry-code::manage.index', [
            'codes' => $this->entryCode->paginate(self::RESULTS_PER_PAGE),
            'users' => $this->user->get(),
            'unallocatedTotal' => $this->entryCode->unallocated()->count()
        ]);
    }

    public function post(\Jarker\Entry\Models\EntryCode $entryCode, \Illuminate\Http\Request $request)
    {
        $entryCode->user()->disassociate();

        if ($request->has('userId') && $user = \App\Models\User::find($request->get('userId'))) {
            $entryCode->user()->associate($user);
        }

        $entryCode->save();

        return back();
    }
}

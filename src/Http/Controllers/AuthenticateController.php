<?php
namespace Jarker\Entry\Http\Controllers;

use Illuminate\Support\Facades\Validator;

class AuthenticateController extends \Illuminate\Routing\Controller
{
    private const POST_VALIDATION_RULES = ['code' => ['required', 'string']];

    public function __construct(private readonly \Jarker\Entry\Models\EntryCode $entryCode) {}

    public function get()
    {
        return view('entry-code::authenticate.authenticate', []);
    }

    public function post(\Illuminate\Http\Request $request)
    {
        $validator = Validator::make($request->all(), self::POST_VALIDATION_RULES);
        if ($validator->fails()) {
            return redirect()->route('entry-code.authenticate')
                ->withErrors($validator)
                ->withInput();
        }

        if ($this->entryCode->hasCode($request->get('code'))) {
            return view('entry-code::authenticate.authenticated', []);
        } else {
            return redirect()->route('entry-code.authenticate')
                ->withErrors(['code' => 'The given entry code was incorrect, please try again.'])
                ->withInput();
        }
    }
}

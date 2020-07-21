<?php

namespace Sara\Translate\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Sara\Translate\Key;
use Sara\Translate\Language;

class KeyController extends Controller
{
    /**
     * @param $languageName
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showKey($languageName)
    {
        $language = Language::where('name', $languageName)->first();
        $keys = Key::with([
            'translations' => function ($query) use ($language) {
                $query->where('language_id', $language->id);
            },
        ])->get();
        return view('translator::show', compact('keys', 'language'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeKey(Request $request)
    {
        $request->action == 'delete' ? $this->deleteKey($request) : $this->save($request);
        return back();
    }

    /**
     * @param $request
     */
    private function deleteKey($request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Key::where('name', $request->name)->delete();
    }

    /**
     * @param $request
     */
    private function save($request)
    {
        $request->validate([
            'name' => 'required|unique:keys',
        ]);
        $key = Key::where('name', $request->previous_name);
        $key->exists() ? $this->update($key, $request) : $this->add($request);
    }

    /**
     * @param $request
     */
    private function add($request)
    {
        Key::create([
            'name' => $request->name,
        ]);
    }

    /**
     * @param $key
     * @param $request
     */
    private function update($key, $request)
    {
        $key->update([
            'name' => $request->name,
        ]);
    }


}

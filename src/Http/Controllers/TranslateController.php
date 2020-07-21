<?php

namespace root_rzbn\translate\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use root_rzbn\translate\Translation;

class TranslateController extends Controller
{
    /**
     * @param                          $languageId
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function translation($languageId, Request $request)
    {
        $record = Translation::where('key_id', $request->key_id)->where('language_id', $languageId);
        $record->exists() ? $this->update($request,$record) : $this->store($request,$languageId);
        return back();
    }

    /**
     * @param $request
     * @param $languageId
     */
    private function store($request,$languageId)
    {
        Translation::create([
            'key_id' => $request->key_id,
            'language_id' => $languageId,
            'name' => $request->translation,
        ]);
    }

    /**
     * @param $request
     * @param $record
     */
    private function update($request,$record)
    {
        $record->update([
            'name' => $request->translation,
        ]);
    }
}

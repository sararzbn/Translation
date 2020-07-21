<?php

namespace Sara\Translate\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Sara\Translate\Language;

class LanguageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $languages = Language::get();
        return view('translator::index', compact('languages'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addNewLanguage(Request $request)
    {
        $request->language_id ? $this->update($request) : $this->store($request);
        return back();
    }

    /**
     * @param $request
     */
    private function store($request)
    {
        $this->validation($request);
        $fileName = $this->upload($request);
        $this->save($request, $fileName);
    }

    /**
     * @param $request
     */
    private function update($request)
    {
        $args = [
            'name' => $request->name,
            'direction' => $request->direction,
        ];
        if ($request->flag) {
            unlink(public_path('assets/images'));
            $fileName = $this->upload($request);
            $args + ['flag' => $fileName];
        }
        Language::whereId($request->language_id)->update($args);
    }

    /**
     * @param $request
     */
    private function validation($request)
    {
        $request->validate([
            'name' => 'required|unique:languages',
            'flag' => 'required|mimes:png,svg,jpg,jpeg|max:2048',
            'direction' => 'required',
        ]);
    }

    /**
     * @param $request
     * @param $fileName
     */
    private function save($request, $fileName)
    {
        Language::create([
            'name' => $request->name,
            'flag' => $fileName,
            'direction' => $request->direction,
        ]);
    }

    /**
     * @param $request
     *
     * @return string
     */
    private function upload($request)
    {
        $fileName = time().'.'.$request->flag->extension();
        $request->flag->move(public_path('assets/images'), $fileName);

        return $fileName;
    }
}

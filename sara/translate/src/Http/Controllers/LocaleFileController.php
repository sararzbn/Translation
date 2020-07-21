<?php

namespace Sara\Translate\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Lang;
use Sara\Translate\Key;
use Sara\Translate\Language;

class LocaleFileController extends Controller
{
    /**
     * @var
     */
    private $lang;

    /**
     * @param $languageId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function publish($languageId)
    {
        $this->lang = Language::whereId($languageId)->value('name');
        $keys = Key::with([
            'translations' => function ($query) use ($languageId) {
                $query->where('language_id', $languageId);
            },
        ])->get();
        $this->save($keys);
        return back();
    }

    /**
     * @param $keys
     */
    private function save($keys)
    {
        $content = "<?php\n\nreturn\n[\n";
        foreach ($keys as $key) {
            $value = isset($key->translations[0]) ? $key->translations[0]->name : '';
            $content .= "\t'".$key->name."' => '".$value."',\n";
        }
        $content .= "];";
        $path = base_path().'/resources/lang/'.$this->lang.'/translation'.'.php';
        file_put_contents($path, $content);
    }
}

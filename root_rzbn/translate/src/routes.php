<?php

Route::get('language', 'root_rzbn\Translate\Http\Controllers\LanguageController@index')->name('language');

Route::get('key-list/{languageName}', 'root_rzbn\Translate\Http\Controllers\KeyController@showKey')->name('show.key');

Route::post('translation/{languageId}', 'root_rzbn\Translate\Http\Controllers\TranslateController@translation')->name('translation');

Route::post('add-new-language', 'root_rzbn\Translate\Http\Controllers\LanguageController@addNewLanguage')->name('add.new.language');

Route::post('change-key', 'root_rzbn\Translate\Http\Controllers\KeyController@changeKey')->name('change.key');


Route::post('publish/{languageId}', 'root_rzbn\Translate\Http\Controllers\LocaleFileController@publish')->name('publish');


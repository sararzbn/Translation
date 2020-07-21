<?php

Route::get('language', 'Sara\Translate\Http\Controllers\LanguageController@index')->name('language');

Route::get('key-list/{languageName}', 'Sara\Translate\Http\Controllers\KeyController@showKey')->name('show.key');

Route::post('translation/{languageId}', 'Sara\Translate\Http\Controllers\TranslateController@translation')->name('translation');

Route::post('add-new-language', 'Sara\Translate\Http\Controllers\LanguageController@addNewLanguage')->name('add.new.language');

Route::post('change-key', 'Sara\Translate\Http\Controllers\KeyController@changeKey')->name('change.key');


Route::post('publish/{languageId}', 'Sara\Translate\Http\Controllers\LocaleFileController@publish')->name('publish');


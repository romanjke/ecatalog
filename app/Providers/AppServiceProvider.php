<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Collective\Html\FormFacade;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        FormFacade::component('bsText', 'form.text', ['field', 'field_name', 'field_value' => null, 'attributes' => []]);
        FormFacade::component('bsTextArea', 'form.textarea', ['field', 'field_name', 'field_value' => null, 'attributes' => []]);
        FormFacade::component('postLink', 'form.post-link', ['route', 'method', 'text', 'attributes' => [], 'fa_icon' => false]);
        FormFacade::component('bsSelect2', 'form.select2', ['field', 'field_name', 'api_url', 'text_field', 'field_value' => null, 'attributes' => [], 'id_field' => 'id']);
        FormFacade::component('bsDate', 'form.date', ['field', 'field_name', 'field_value' => Carbon::now(), 'attributes' => []]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

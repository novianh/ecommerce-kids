<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Footer;
use App\Models\Logo;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // You can use a class for composer we created earlier
        // you will need NavigationViewComposer@compose method
        // which will be called everythime partials.nav is requested
        View::composer(
            'partials.navigation',
            'App\Http\ViewComposers\NavigationViewComposer'
        );

        // Or you can use below callback function
        View::composer(['frontend.layouts.shopping.partials.header', 'frontend.layouts.home.partials.header', 'frontend.layouts.shopping.partials.footer', 'frontend.layouts.home.partials.footer'], function ($view) {

            $view->with('logo', Logo::latest()->first())
                ->with('social', Contact::all())
                ->with('footer', Footer::latest()->first());;
        });
    }
}

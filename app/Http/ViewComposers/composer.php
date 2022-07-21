<?php

namespace App\Http\ViewComposers;

use App\Models\Contact;
use App\Models\Footer;
use App\Models\Logo;
use App\Models\Menu;

class NavigationViewComposer
{
   public function compose($view)
   {
      $view->with([
         'logo', Logo::latest()->first(),
         'social', Contact::all(),
         'footer', Footer::latest()->first()
      ]);
   }
}

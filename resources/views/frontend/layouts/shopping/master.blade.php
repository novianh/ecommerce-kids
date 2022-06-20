<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Kids Ecommerce</title>
   @include('frontend.stylesheet')
   @yield('style')
   <link rel="stylesheet" href="{{ asset ('ecommerce/style/caraousel.css') }}">
</head>
<body>
   <header>
      <div class="container">
         @include('frontend.layouts.shopping.partials.header')
         
         <section id="othPage">
            <div class="row justify-content-center">
               <div class="col-3 bg-light rounded-5"></div>
               <div class="col-12 text-center mb-5 mt-5">
                  <div class="circle rounded-circle mx-auto mb-2"></div>
                  <h3>@yield('title')</h3>
               </div>
            </div>
         </section>
      </div>
   
   </header>

   @yield('content')

   @include('frontend.layouts.shopping.partials.footer')

   @include('frontend.javascript')
   @yield('js')
</body>
</html>
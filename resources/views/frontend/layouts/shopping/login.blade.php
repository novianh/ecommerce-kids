<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Kids Ecommerce</title>
   @include('frontend.stylesheet')
</head>

<body>

   <main id="login">
      <div class="container-fluid">
         <div class="row position-relative justify-content-center " style="z-index: 10;">
            <div class="col-6 px-0">
               <div class="image" style="background: #8CC0DE"></div>
            </div>
            <div class="col-6 px-0">
               <div class="image" style="background: #F4BFBF;"></div>
            </div>
         </div>
         <div class="mb-3 card border-0 bg-white rounded-5 position-absolute" style="z-index: 100; top: 50%; max-width: 35rem;
         min-width: 20rem;
               left: 50%; transform: translate(-50%, -50%);">
            <div class=" card-body rounded-5 p-5 pb-0 bg-light">
               <div class="row justify-content-around align-items-center flex-column gap-5 g-5">
                  <div class="col-12">

                     <h4 class="text-center mb-5" style="font-weight: 700 !important;">Login</h4>
                     <form action="">
                        <div class="mb-3">
                           <label for="exampleInputEmail1" class="form-label">Email address</label>
                           <input type="email" class="form-control" id="exampleInputEmail1"
                              aria-describedby="emailHelp">
                           <div id="emailHelp" class="form-text text-secondary mb-0" style="font-weight: 600;">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                           <label for="exampleInputPassword1" class="form-label">Password</label>
                           <input type="password" class="mb-2 form-control" id="exampleInputPassword1">
                           <p><small><a href="" class="link"
                                    style="font-weight: 600 !important; color: #8CC0DE !important ;"> Forgot
                                    Password?</a></small></p>
                        </div>
                        <button type="submit" class="btn rounded-5 px-3">Submit</button>
                     </form>
                  </div>
                  <div class="col">
                     <a href="/home.html" class="link position-absolute bottom-0 mb-3">Back to home</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>


   @include('frontend.javascript')
</body>

</html>
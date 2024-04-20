@extends('app-view.layouts')

@section('content')




 
<div class="container" style="display:flex;flex-direction:column;justify-content:center;align-items:center;margin-top:2rem">
   <div class="logo" style="display:flex;justify-content:center;align-items:center;width:fit-content;"><img src="images/bowi-logo.png" alt="" style="width:300px;"></div>
    <div >
            <div class=>
            

                <div class="card-body" style="width: 350px;padding:2rem 2rem 0 2rem">
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div>
                            <label for="email" style="font-weight:100">Email Address</label>
                            <input id="email"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')

                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>

                            @enderror
                        </div>
                        <div>
                            <label for="password" style="font-weight:100">Password</label>
                            <input id="password"  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')

                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>

                            @enderror
                        </div>
                            <br>
                        <div style="display:flex;flex-direction:column;justify-content:center;align-items:center;">
                            <div>
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"  {{ old('remember') ? 'checked' : '' }}>
                                
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label> 
                            
                                                    <a style="text-decoration:none;padding:0px 0px 5px 5px" class="btn btn-link" href="auth.forgot-password">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                            </div>
                            <br>
                            <button type="submit" class="btn" style="width:200px;height:4rem;border-radius:2rem;background-color:black;color:aliceblue ; ">
                                <p style="font-size:x-large;font-weight:100;text-align:center;padding:0.4rem 1rem;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">  {{ __('Login') }} </p>
                            </button>
                        </div>
                            {{-- @if (Route::has('password.request'))

                            

                            @endif --}}
                    </form>
                
                </div>
        </div>
    </div>

    <div style="width:97% ;display: flex; justify-content: center;align-items: center;margin-top:1rem">
        <a href="" style="text-decoration: none;" > Need Help ? </a>
        </div>

   <div style="width:15%;margin:auto;padding:auto"> <hr>   </div>
                <div style="width: 100%;display: flex;flex-wrap: wrap; justify-content: center;align-items: center;"  >
                    <p>Don't have a Merchant account? </p>&nbsp; <a href="/becomePartner"  style="text-decoration: none;padding:0px 0px 16px 0px">Sign Up With Bowi</a>
                </div>


</div>




@endsection
 
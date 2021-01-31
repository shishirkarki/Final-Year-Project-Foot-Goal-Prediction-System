@extends('layouts.app')

@section('content')

		<div class="form-v9-content" style="background-image: url('svg/form-v9.jpg')">
                
                <form class="form-detail" action="{{ route('register') }}" method="post">
                @csrf
 <!-- Register form start from here -->
                    <h2>Registration Form</h2>
<!-- Form for name register -->
				        <div class="form-row-total">
					        <div class="form-row">  
						        <input type="text" name="name" id="name"  class="input-text @error('name') is-invalid @enderror"  placeholder="Your Name" value="{{ old('name') }}" autocomplete="name" autofocus>
<!-- Validation for name -->
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					        </div>
<!-- email form -->

					        <div class="form-row">
						        <input type="text" name="email" id="email" class="input-text @error('email') is-invalid @enderror" placeholder="Your Email" value="{{ old('email') }}" autocomplete="email">
<!-- email validation -->                            
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					        </div>
				        </div>

<!-- password form -->
				        <div class="form-row-total">
					        <div class="form-row">
						        <input type="password" name="password" id="password" class="input-text @error('password') is-invalid @enderror"  autocomplete="new-password" placeholder="Your Password">
<!-- password form validation -->
                                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

					        <div class="form-row">
						        <input type="password" name="password_confirmation" id="password-confirm" class="input-text" placeholder="Comfirm Password" autocomplete="new-password">
				        	</div>
                        </div>

<!-- confirm password form -->                        

                        <div class="form-row-last">
					<input type="submit" name="register" class="register" value=" {{ __('Register') }}">
				</div>

			</form>
		</div>
	</div>
@endsection

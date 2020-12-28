<div class="ui inverted raised very padded container segment">
  <div class="ui centered container">
    <form class="ui inverted big form" method="POST" id="signup" action="/register">
      <h2 class="ui inverted centered header">Sign up Now</h2>
          {{ csrf_field() }}
          <div class="field">
              <label>Username</label>
              <input type="text" placeholder="Username" name="username" value="{{ old('username') }}">
              @if($errors->has('username'))
               <div class="ui tiny negative message">
                   <i class="warning circular icon"></i>
                   {{ $errors->first('username') }}
               </div>
              @endif
          </div>
          <div class="field">
            <label>Email</label>
            <input type="email" name="email" placeholder="Example@example.com" class="ui input" autocomplete="email" value="{{ old('email') }}">
            @if($errors->has('email'))
             <div class="ui tiny negative message">
               <i class="warning circular icon"></i>
               {{ $errors->first('email') }}
             </div>
            @endif
          </div>
        <div class="two fields">
          <div class="field">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password" class="ui input" autocomplete="new-password">
            @if($errors->has('password'))
             <div class="ui tiny negative message">
               <i class="warning circular icon"></i>
               {{ $errors->first('password') }}
             </div>
            @endif
          </div>
          <div class="field">
            <label>Password Confirmation</label>
            <input type="password" name="password_confirmation" placeholder="Password Confirmation" class="ui input" autocomplete="new-password">
            @if($errors->has('password_confirmation'))
             <div class="ui tiny negative message">
               <i class="warning circular icon"></i>
               {{ $errors->first('password_confirmation') }}
             </div>
            @endif
          </div>
        </div>
        <div class="inline field">
            <div class="ui slider checkbox">
                <input type="checkbox" name="terms_and_conditions">
                <label>I agree to <a href="{{ url('/terms') }}">the Terms and Conditions</a></label>
                @if($errors->has('terms_and_conditions'))
                 <div class="ui tiny negative message">
                   <i class="warning circular icon"></i>
                   {{ $errors->first('terms_and_conditions') }}
                 </div>
                @endif
            </div>
        </div>
        <div>
          <input type="submit" class="ui inverted fluid basic button" value="Sign up">
        </div>
    </form>
</div>
</div>

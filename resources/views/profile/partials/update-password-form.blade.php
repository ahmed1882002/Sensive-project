<div class="profile-card" style="border-left-color: #333;">
    <h2 class="profile-title">{{ __('Update Password') }}</h2>
    <p class="profile-subtitle">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="profile-form-group">
            <label for="update_password_current_password" class="profile-label">{{ __('Current Password') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" class="profile-control" autocomplete="current-password">
            @if($errors->updatePassword->has('current_password'))
                <span class="text-danger d-block mt-1">{{ $errors->updatePassword->first('current_password') }}</span>
            @endif
        </div>

        <div class="profile-form-group">
            <label for="update_password_password" class="profile-label">{{ __('New Password') }}</label>
            <input id="update_password_password" name="password" type="password" class="profile-control" autocomplete="new-password">
            @if($errors->updatePassword->has('password'))
                <span class="text-danger d-block mt-1">{{ $errors->updatePassword->first('password') }}</span>
            @endif
        </div>

        <div class="profile-form-group">
            <label for="update_password_password_confirmation" class="profile-label">{{ __('Confirm Password') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="profile-control" autocomplete="new-password">
            @if($errors->updatePassword->has('password_confirmation'))
                <span class="text-danger d-block mt-1">{{ $errors->updatePassword->first('password_confirmation') }}</span>
            @endif
        </div>

        <div class="d-flex align-items-center mt-4 pt-2">
            <button type="submit" class="btn-profile-save">{{ __('Update Password') }}</button>
            @if (session('status') === 'password-updated')
                <span class="text-success ml-3 font-weight-bold">{{ __('Password updated.') }}</span>
            @endif
        </div>
    </form>
</div>

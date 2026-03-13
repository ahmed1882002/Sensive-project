<div class="profile-card">
    <h2 class="profile-title">{{ __('Profile Information') }}</h2>
    <p class="profile-subtitle">{{ __("Update your account's profile information and email address.") }}</p>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="profile-form-group d-flex align-items-center mb-4">
            @if($user->image)
                <img src="{{ asset('storage/' . $user->image) }}" alt="Profile" class="profile-avatar-preview mr-4">
            @else
                <img src="{{ asset('assets/img/avatar.png') }}" alt="Profile" class="profile-avatar-preview mr-4">
            @endif
            <div>
                <label for="image" class="profile-label">{{ __('Change Profile Picture') }}</label>
                <input id="image" name="image" type="file" class="profile-control p-2" accept="image/*">
                @error('image') <span class="text-danger d-block mt-1">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="profile-form-group">
            <label for="name" class="profile-label">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" class="profile-control" value="{{ old('name', $user->name) }}" required autocomplete="name">
            @error('name') <span class="text-danger d-block mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="profile-form-group">
            <label for="email" class="profile-label">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="profile-control" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email') <span class="text-danger d-block mt-1">{{ $message }}</span> @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3">
                    <p class="text-muted text-sm">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="btn btn-link p-0 m-0 align-baseline">{{ __('Click here to re-send the verification email.') }}</button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="text-success mt-2 text-sm">{{ __('A new verification link has been sent to your email address.') }}</p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center mt-4 pt-2">
            <button type="submit" class="btn-profile-save">{{ __('Save Changes') }}</button>
            @if (session('status') === 'profile-updated')
                <span class="text-success ml-3 font-weight-bold">{{ __('Saved successfully.') }}</span>
            @endif
        </div>
    </form>
</div>

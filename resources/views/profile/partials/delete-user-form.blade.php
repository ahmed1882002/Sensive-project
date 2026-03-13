<div class="profile-card" style="border-left-color: #e05252;">
    <h2 class="profile-title">{{ __('Delete Account') }}</h2>
    <p class="profile-subtitle">{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}</p>

    <button type="button" class="btn-profile-danger" data-toggle="modal" data-target="#deleteAccountModal">
        {{ __('Delete Account') }}
    </button>

    <!-- Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" role="dialog" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 15px; border: none;">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')
                    
                    <div class="modal-header" style="border-bottom: 1px solid #eee; padding: 20px 30px;">
                        <h5 class="modal-title profile-title" style="font-size: 1.4rem; margin:0;" id="deleteAccountModalLabel">{{ __('Are you sure?') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body" style="padding: 30px;">
                        <p class="profile-subtitle" style="margin-bottom: 20px;">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm.') }}
                        </p>
                        <div class="profile-form-group mb-0">
                            <label for="password" class="profile-label">{{ __('Password') }}</label>
                            <input id="password" name="password" type="password" class="profile-control" placeholder="{{ __('Enter your password') }}" required>
                            @if($errors->userDeletion->has('password'))
                                <span class="text-danger d-block mt-1">{{ $errors->userDeletion->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="modal-footer" style="border-top: none; padding: 20px 30px;">
                        <button type="button" class="btn btn-light" style="border-radius: 8px; font-family: 'DM Sans', sans-serif;" data-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn-profile-danger">{{ __('Delete Account') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if($errors->userDeletion->isNotEmpty())
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#deleteAccountModal').modal('show');
    });
</script>
@endif

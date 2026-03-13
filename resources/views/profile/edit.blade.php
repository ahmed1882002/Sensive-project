@extends('master')
@section('title', 'Profile Settings')

@section('content')
    @include('theme.partials.hero', ['title' => 'Profile Settings'])

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=DM+Sans:wght@300;400;500;700&display=swap');

        .profile-settings-section {
            padding: 60px 0;
            background: linear-gradient(135deg, #fafaf8 0%, #f0ede6 100%);
            min-height: 70vh;
        }

        .profile-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            border-left: 5px solid #c9a96e;
        }

        .profile-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: #1a1a1a;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .profile-subtitle {
            font-family: 'DM Sans', sans-serif;
            color: #777;
            font-size: 0.95rem;
            margin-bottom: 30px;
        }

        .profile-form-group {
            margin-bottom: 25px;
        }

        .profile-label {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.85rem;
            font-weight: 700;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 10px;
            display: block;
        }

        .profile-control {
            font-family: 'DM Sans', sans-serif;
            background: #fafaf8;
            border: 1px solid #e8e4dc;
            border-radius: 8px;
            padding: 12px 18px;
            width: 100%;
            transition: all 0.3s ease;
            color: #333;
        }

        .profile-control:focus {
            border-color: #c9a96e;
            box-shadow: 0 0 0 3px rgba(201, 169, 110, 0.15);
            outline: none;
            background: #fff;
        }

        .btn-profile-save {
            background: #1a1a1a;
            color: #fff;
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
            padding: 12px 30px;
            border-radius: 8px;
            border: none;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-profile-save:hover {
            background: #c9a96e;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(201, 169, 110, 0.4);
            color: #fff;
        }

        .btn-profile-danger {
            background: #e05252;
            color: #fff;
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
            padding: 12px 30px;
            border-radius: 8px;
            border: none;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-profile-danger:hover {
            background: #c93030;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(224, 82, 82, 0.4);
            color: #fff;
        }
        
        .profile-avatar-preview {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #c9a96e;
            padding: 3px;
        }
    </style>

    <section class="profile-settings-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @include('profile.partials.update-profile-information-form')
                    @include('profile.partials.update-password-form')
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </section>
@endsection

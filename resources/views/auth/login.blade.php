@section('title', 'Login | Pritom Drug Store')
<x-guest-layout>
    <style>
        .error-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 100;
        }

        .error-content {
            width: 350px;
            height: 250px;
            border:5px solid steelblue;
            border-radius: 20px;
            background-color: whitesmoke;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 17px;
        }
    </style>

    <!-- Session Status -->

    <div class="container">
        <div class="box">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1 style="text-align: center;">Login</h1>
                <h2 style="text-align: center;">Don't have an account? <a style="color: rgb(61, 178, 255); text-decoration: none;" href="{{ route('register') }}">Create a free Account</a> </h2>
                <label for="email"><b>Email</b></label>
                <x-text-input id="email" placeholder="example@gmail.com" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="off" />
                <label for="psw"><b>Password</b></label>
                <x-text-input id="password" placeholder="Min. 6 Character" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="off" />
                <div class="block mt-4">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span>{{ __('Remember me') }}</span>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a style="color: rgb(61, 178, 255); text-decoration: none; text-align:right; display: block; margin-right: 50px;margin-top: -20px;" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <div class="error-modal" id="errorModal" data-has-error="{{ $errors->has('email') ? 'true' : 'false' }}">
                        <div class="error-content">
                            @error('email')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <label class="ini">Sign in Social Account</label>
                
                <div class="social">
                    <a href="{{url('redirect')}}"><img src="../image/facebook.png"></a>
                    <a href="{{route('google-auth')}}"><img src="../image/google.png"></a>

                </div>
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var errorModal = document.getElementById('errorModal');

            document.addEventListener('click', function (event) {
                if (event.target === errorModal) {
                    hideErrorModal();
                }
            });

            function showErrorModal() {
                errorModal.style.display = 'flex';
            }

            function hideErrorModal() {
                errorModal.style.display = 'none';
            }

            // Show the error modal only if there is an error
            var hasError = errorModal.getAttribute('data-has-error') === 'true';
            if (hasError) {
                showErrorModal();
            }
        });
    </script>
</x-guest-layout>

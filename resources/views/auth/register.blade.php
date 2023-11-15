@section('title', 'Register | Pritom Drug Store')
<x-guest-layout>
    <style>
        .box
        {
            height:660px;
        }
        .container
        {
            height: 780px;
        }
        .box .ms-4
        {
            margin-top: 20px;
        }
    </style>
    <div class="container">
            <div class="box">
                <h1 style="text-align: center;">Register</h1>
                <h2 style="text-align: center;">Create Your Account</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name"><b>Name</b></label>
                    <x-text-input id="name" placeholder="Priton Bhai" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone"><b>Phone</b></label>
                    <x-text-input id="phone" placeholder="0123******" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <label for="email"><b>Email</b></label>
                    <x-text-input id="email" placeholder="example@gmail.com" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password"><b>Pasword</b></label>
                    <x-text-input id="password" placeholder="Min. 8 Character" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <label for="password_confirmation"><b>Confirm Password</b></label>
                    <x-text-input id="password_confirmation" placeholder="Min. 8 Character" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                <a style="font-weight:900; color: rgb(61, 178, 255);text-align:right; display: block; margin-right: 50px; margin-top: 10px; text-decoration: none;" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>

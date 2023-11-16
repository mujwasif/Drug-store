<x-guest-layout>

    <style>
        .box
        {
            height: 550px
        }
        .m3
        {
            background-color:rgb(0, 0, 0);
            color:white;
            font-family:'Roboto', sans-serif;
            font-weight: 700;
            font-size: 16px;
            margin: 10px 0px 0px 33px;
            padding: 18px 180px;
            border-radius: 3px;
            border:1px solid silver;
        }
        .m3:hover
        {
            background-color:rgb(43, 142, 235);
            cursor: pointer;
            border:1px solid silver;
        }
        .text-box
        {
            text-decoration: none;
            color:rgb(255, 0, 25);
            text-align: center;
            list-style: none;
            font-weight: 900;
        }

    </style>

<div class="container">
        <div class="box">
            <h1 style="text-align: center;">Please confirm your password</h1>
            <h2 style="text-align: center; font-size:15px;">This is a secure area of the application. Please confirm your password before continuing.</h2>
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                
                <label for="email"><b>Email</b></label>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="text-box" />
            

                <!-- Password -->
                
                <label for="password"><b>Password</b></label>
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="text-box" />
            

                <!-- Confirm Password -->
            
                <label for="password_confirmation"><b>Password Confirmation</b></label>

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="text-box" />
                

                
                <x-primary-button class='m3'>
                    {{ __('Reset Password') }}
                </x-primary-button>
                
            </form>
        </div>
</div>
</x-guest-layout>

<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $first_name = '';
    public string $middle_name = '';
    public string $last_name = '';
    public string $age = '';
    public string $gender = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirectIntended(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Name -->
        <flux:input
            wire:model="first_name"
            :label="__('First Name')"
            type="text"
            required
            autofocus
            autocomplete="first_name"
            :placeholder="__('First Name')"
        />

        <flux:input
            wire:model="middle_name"
            :label="__('Middle Name')"
            type="text"
            required
            autofocus
            autocomplete="middle_name"
            :placeholder="__('Middle Name')"
        />

        <flux:input
            wire:model="last_name"
            :label="__('Last Name')"
            type="text"
            required
            autofocus
            autocomplete="last_name"
            :placeholder="__('Last Name')"
        />

        <div class="flex gap-2">
            <flux:input
                wire:model="age"
                :label="__('Age')"
                type="text"
                required
                autofocus
                autocomplete="age"
                :placeholder="__('Age')"
            />

            <flux:select
                wire:model="gender"
                :label="__('Gender')"
                type="text"
                required
                autofocus
                autocomplete="gender"
                :placeholder="__('Gender')"
            >
                <flux:select.option class="option text-zinc-700">Male</flux:select>
                <flux:select.option class="option text-zinc-700">Female</flux:select>
            </flux:select>
        </div>

        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Email address')"
            type="email"
            required
            autocomplete="email"
            placeholder="email@example.com"
        />

        <!-- Password -->
        <flux:input
            wire:model="password"
            :label="__('Password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Password')"
            viewable
        />

        <!-- Confirm Password -->
        <flux:input
            wire:model="password_confirmation"
            :label="__('Confirm password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Confirm password')"
            viewable
        />

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Create account') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-300 dark:text-zinc-400">
        {{ __('Already have an account?') }}
        <flux:link class="text-white" :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
    </div>
</div>

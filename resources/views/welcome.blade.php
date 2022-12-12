<x-layouts.app>
    <div class="flex">
        <a href="{{ route('login') }}">
            <x-primary-button>
                Login
            </x-primary-button>
        </a>
        <a href="{{ route('register') }}">
            <x-primary-button>
                Register
            </x-primary-button>
        </a>
    </div>
</x-layouts.app>
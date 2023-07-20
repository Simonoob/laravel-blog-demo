<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20">
        <section class="max-w-md mx-auto">
            <x-panel class="grid space-y-6">
                <h1 class="text-center font-bold text-xl">Log In</h1>
                <form method="POST" action="/sessions" class="space-y-4">
                    @csrf

                    <x-form.input name="email" type="email" />
                    <x-form.input name="password" type="password" />

                    <button
                        class="block  capitalize font-bold text-xs text-gray-700 w-full p-4 border-2 border-gray-200 hover:border-gray-300 bg-gray-100 rounded-md"
                        type="submit">
                        Log in
                    </button>

                    @error('loginError')
                        <p class="text-red-600 text-xs rounded-md ring-2 ring-red-200 bg-red-50 p-2 mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </form>
            </x-panel>
        </section>
    </main>
</x-layout>

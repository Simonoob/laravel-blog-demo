<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20">
        <section class="max-w-md mx-auto">
            <x-panel class="grid space-y-6">
                <h1 class="text-center font-bold text-xl">Register</h1>
                <form method="POST" action="register" class="space-y-4">
                    @csrf
                    <x-form.input name="name" />
                    <x-form.input name="username" />
                    <x-form.input name="email" type="email" />
                    <x-form.input name="password" type="password" />

                    <button
                        class="block  capitalize font-bold text-xs text-gray-700 w-full p-4 border-2 border-gray-200 hover:border-gray-300 bg-gray-100 rounded-md"
                        type="submit">
                        Submit
                    </button>
                </form>
            </x-panel>
        </section>
    </main>
</x-layout>

@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
        class="fixed bottom-10 right-10 py-2 px-10 text-xs ring-2 ring-green-200 bg-green-50 text-green-600 rounded-full">
        <p>{{ session()->get('success') }}</p>
    </div>
@endif

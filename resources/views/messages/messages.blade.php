@if (session()->has('success'))
    <div class="bg-green-100 text-green-700 p-2 rounded-lg my-4">
        {{ session('success') }}
    </div>
@endif

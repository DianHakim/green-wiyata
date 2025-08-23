@extends('layouts.guest')

@section('content')
<div class="w-full max-w-md mx-auto mt-10">
    <h1 class="text-xl font-bold mb-4">Login</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email" class="w-full border rounded p-2">
        </div>
        <div class="mb-4">
            <label>Password</label>
            <input type="password" name="password" class="w-full border rounded p-2">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Login</button>
    </form>
</div>
@endsection

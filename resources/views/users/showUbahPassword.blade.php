@extends('componen.app')
@section('isi')
<div class=" h-screen sm:ml-64 bg-white  overflow-auto py-5 pt-16 font-popins">
    <div class=" flex justify-between p-4  text-2xl text-emerald-700 font-bold bg-white  fixed z-10 top-16 w-full border-b">
        <h1>Ubah Password</h1>
    </div>
        <div class="flex items-center justify-center">
            <div class=" p-8 rounded shadow-md max-w-md w-full mt-20 border">
                <h2 class="text-2xl font-semibold mb-6 text-emerald-700/70">Change Password</h2>
                
                <form method="POST" action="{{ route('change-password') }}">
                    @csrf
    
                    <div class="mb-4">
                        <label for="current_password" class="block text-sm font-medium text-gray-600">Current Password</label>
                        <input id="current_password" type="password" class="mt-1 p-2 w-full border rounded-md" name="current_password" required>
                    </div>
    
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-600">New Password</label>
                        <input id="password" type="password" class="mt-1 p-2 w-full border rounded-md" name="password" required>
                    </div>
    
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-600">Confirm New Password</label>
                        <input id="password_confirmation" type="password" class="mt-1 p-2 w-full border rounded-md" name="password_confirmation" required>
                    </div>
    
                    <div class="flex items-center justify-end">
                        <button class="text-white bg-emerald-400 p-2
                            hover:bg-emerald-200 hover:text-emerald-700 text-center font-popins rounded-md transition-all">Submit</button>
                    </div>
                    {{-- @error('current_password')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                    @error('password')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ $message }}</span>
                    </div>
                    @enderror
                    @error('password_confirmation')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ $message }}</span>
                    </div>
                    @enderror --}}
                </form>
            </div>
        </div>
        <a href="/profile/{{$user->id}}"><button class=" text-white bg-emerald-400 p-2
            text-lg hover:bg-emerald-200 hover:text-emerald-700 text-center font-popins rounded-md transition-all mt-5 ms-[20.7rem]">Kembali</button></a>
</div>
    
@endsection
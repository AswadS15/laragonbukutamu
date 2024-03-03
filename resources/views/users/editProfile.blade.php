@extends('componen.app')
@section('isi')
<div class=" h-screen sm:ml-64 bg-white  overflow-auto py-5 pt-16 font-popins">
    <div class=" flex justify-between p-4  text-2xl text-emerald-700 font-bold bg-white  fixed z-10 top-16 w-full border-b">
        <h1>Edit Profile</h1>
    </div>
        <div class="flex items-center justify-center">
            <div class=" p-8 rounded shadow-md max-w-md w-full mt-20 border">
                <h2 class="text-2xl font-semibold mb-6 text-emerald-700/70">Edit Profile</h2>
                
                <form method="POST" action="{{ route('updateProfile') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-600">Nama</label>
                        <input id="name" type="text" class="mt-1 p-2 w-full border rounded-md" name="name" required value="{{ old('name', $user->name) }}">
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                        <input id="email" type="text" class="mt-1 p-2 w-full border rounded-md" name="email" required value="{{ old('email', $user->email) }}">
                    </div>
    
                    <div>
                        <button class="w-full text-white bg-emerald-400 p-2
                            hover:bg-emerald-200 hover:text-emerald-700 text-center font-popins rounded-md transition-all">Edit</button>
                    </div>
                    <div class="mt-5">
                        @error('name')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative" role="alert">
                                <strong class="font-bold">Error!</strong>
                                <span class="block sm:inline">{{ $message }}</span>
                            </div>
                        @enderror
                        @error('email')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative" role="alert">
                                        <strong class="font-bold">Error!</strong>
                                        <span class="block sm:inline">{{ $message }}</span>
                                    </div>
                        @enderror
                    </div>
                   
                </form>

                
            </div>
        </div>
        <a href="/profile/{{$user->id}}"><button class=" text-white bg-emerald-400 p-2
            text-lg hover:bg-emerald-200 hover:text-emerald-700 text-center font-popins rounded-md transition-all mt-5 ms-[20.7rem]">Kembali</button></a>
</div>
    
@endsection
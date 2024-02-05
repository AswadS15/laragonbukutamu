@extends('componen.app')
@section('isi')
<div class=" h-screen sm:ml-64 bg-white  overflow-auto py-5 pt-16 font-popins">
    <div class=" flex justify-between p-4  text-2xl text-emerald-700 font-bold bg-white  fixed z-10 top-16 w-full border-b">
        <h1>Edit User</h1>
    </div>
    <div class="mt-20 w-[90%] mx-auto">
        <div class="max-w-sm w-full rounded-lg shadow-md border p-3  mx-auto">
            <h1 class="py-2 text-center text-xl font-semibold text-emerald-400 border-b-2 mb-2">Form Edit User</h1>
            <div class="px-3">

                <form class="mt-8 space-y-5" method="PUT" action="{{url('users/'.$user->id)}}">
                    @csrf
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="name" id="name" class=" font-popins font-normal block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " required value="{{ old('name', $user->name) }}"/> 
                        <label for="name" class=" font-popins font-normal peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama</label>
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="email" id="email" class=" font-popins font-normal block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " required value="{{ old('email', $user->email) }}"/>
                        <label for="email" class=" font-popins font-normal peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                        @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="password" id="password" name="password"
                        class=" font-popins font-normal block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" 
                            placeholder=" " autocomplete="new-password" value="{{ old('password') }}" />
                        <label for="password"
                        class=" font-popins font-normal peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                        @error('password')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                        class=" font-popins font-normal block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer"
                            placeholder=" " autocomplete="new-password"/>
                        <label for="password"
                        class=" font-popins font-normal peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm Password</label>
                        @error('password_confirmation')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <label for="role" class=" font-popins font-normal block mb-2 text-lg text-gray-500">Pilih Role</label>
                    <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-500 text-lg rounded-lg focus:ring-green-600 focus:border-green-500 block w-full p-2.5" value="{{ old('divisi') }}">
                        <option selected="false" disabled="disabled" class="font-popins font-normal">Role</option>
                        @foreach ($role as $item)
                            @if (old('role', $user->role) == $item)
                                <option class="font-popins font-normal" value="{{$item}}">{{$item}}</option>    
                            @else
                                 <option class="font-popins font-normal" value="{{$item}}">{{$item}}</option>   
                            @endif    
                        @endforeach 
                    </select>
                    @error('role')
                            <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <button type="submit" class="bg-green-400 p-2 text-white rounded-md hover:bg-emerald-600 hover:ring-2 hover:ring-emerald-700">+ User</button> 
                </form>

                {{-- <form class="mt-8 space-y-5" method="POST" action="/users">
                    @csrf
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="name" id="name" class=" font-popins font-normal block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer capitalize" placeholder=" " required value="{{ ($user->name) }}"/> 
                        <label for="name" class=" font-popins font-normal peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama</label>
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        @php
                            $lengthToShow = 3; // Jumlah karakter yang ingin ditampilkan
                            $maskedEmail = substr($user->email, 0, $lengthToShow) . str_repeat('*', strlen($user->email) - $lengthToShow);
                        @endphp
                        <input type="text" name="email" value="{{ $user->email }}" class=" font-popins font-normal block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer ">
                        <label for="email" class=" font-popins font-normal peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                        @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="password" id="password" name="password"
                        class=" font-popins font-normal block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" 
                            placeholder=" " autocomplete="new-password" value="{{ old('password') }}" />
                        <label for="password"
                        class=" font-popins font-normal peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                        @error('password')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                        class=" font-popins font-normal block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer"
                            placeholder=" " autocomplete="new-password"/>
                        <label for="password"
                        class=" font-popins font-normal peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm Password</label>
                        @error('password_confirmation')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <label for="role" class=" font-popins font-normal block mb-2 text-lg text-gray-500">Pilih Role</label>
                    <select disabled id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-500 text-lg rounded-lg focus:ring-green-600 focus:border-green-500 block w-full p-2.5 capitalize" value="{{ old('role') }}">
                        <option class="font-popins font-normal capitalize" value="{{ $user->role }}" selected>{{$user->role}}</option>
                    </select>
                    @error('role')
                            <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <button type="submit" class="bg-green-400 p-2 text-white rounded-md hover:bg-emerald-600 hover:ring-2 hover:ring-emerald-700">+ User</button> 
                </form> --}}
            </div>
        </div>        
    </div>   
</div>  
@endsection
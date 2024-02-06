<section id="layanan" class="pb-24 pt-32 xl:mt-56 md:mt-[900px]  bg-white"  >
    <div class="bg-gray-100 max-w-2xl mx-auto p-5 rounded-lg">
        <h3 class="text-center font-mosrat font-semibold text-3xl text-emerald-700 pb-10">LAYANAN</h3>
        <form class="max-w-xl mx-auto" method="post" action="/#layanan">
            @csrf
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="nama" id="nama" class="font-popins font-normal block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " required value="{{ old('nama') }}"/>
                    <label for="nama" class=" font-popins font-normal peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama</label>
                    
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="instansi" id="instansi" class=" font-popins font-normal block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " required value="{{ old('instansi') }}"/>
                    <label for="instansi" class=" font-popins font-normal peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Instasi/Kelompok Masyrakat</label>
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="tel" name="alamat" id="alamat" class=" font-popins font-normal block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " required  value="{{ old('alamat') }}"/>
                    <label for="alamat" class=" font-popins font-normal peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="hp" id="hp" class=" font-popins font-normal block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " required  value="{{ old('hp') }}"/>
                    <label for="hp" class=" font-popins font-normal peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">No. Handphone</label>
                </div>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="email" id="email" class=" font-popins font-normal block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " required  value="{{ old('email') }}"/>
                <label for="email" class=" font-popins font-normal peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
            </div>
            <label for="divisi" class=" font-popins font-normal block mb-2 text-lg text-gray-500">Pilih divisi</label>
            <select id="divisi" name="divisi" class="bg-gray-50 border border-gray-300 text-gray-500 text-lg rounded-lg focus:ring-green-600 focus:border-green-500 block w-full p-2.5" value="{{ old('divisi') }}">
                <option selected="false" disabled="disabled" class="font-popins font-normal">Pilih Divisi</option>
                @foreach ($divisi as $item)
                    @if(old('divisi') == $item->id)
                    <option class="font-popins font-normal capitalize" value="{{ $item->id }}" selected>{{ $item->divisi_type }}</option>
                    @else  
                    <option class="font-popins font-normal capitalize" value="{{ $item->id }}">{{ $item->divisi_type }}</option>
                    @endif 
                @endforeach      
            </select>
                <label for="tujuan"  class="block mb-2 mt-5 text-lg font-medium text-gray-500">Masukan tujuan Anda</label>
                <input id="tujuan"  type="hidden" name="tujuan">
                <trix-editor input="tujuan"></trix-editor>   
            <button type="submit" class=" mt-3 px-5 py-2 text-sm font-semibold hover:text-white font-popins text-center text-white bg-emerald-500 rounded-lg hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:bg-emerald-600 dark:hover:bg-emerald-400 dark:focus:ring-emerald-800">Submit</button> 
            @error('nama')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
            @enderror
            @error('instansi')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
            @enderror
            @error('alamat')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
            @enderror
            @error('hp')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
            @enderror
            @error('tujuan')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
            @enderror
        </form>
    </div>
</section>
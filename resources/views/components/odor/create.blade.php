        <!-- Modal content -->
        <div class="max-w-4xl relative p-4 bg-white rounded-lg border dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Tambah Kegiatan</h3>                
            </div>
            <!-- Modal body -->
            @if(Auth::user()->role == 'kanwil')
                <form action="/kanwil/odor" method="POST">
            @endif
            @if(Auth::user()->role == 'upt')
                <form action="/upt/odor" method="POST">
            @endif
            
                @csrf             
                <div class="mb-4">
                    <label for="jenis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kegiatan</label>
                    <select id="jenis" name="jenis" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Jenis Kegiatan</option>  <!-- Placeholder option, disabled to prevent selection -->
                        <option value="rutin">RUTIN</option>
                        <option value="insidentil">INSIDENTIL</option>  <!-- Fixed typo: was <optin>, now <option> -->
                    </select>
                </div>
                <div class="mb-4">
                    <label for="stakeholder" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">STAKEHOLDER</label>
                    <select id="stakeholder" name="stakeholder" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>STAKEHOLDER</option>  <!-- Placeholder option, disabled to prevent selection -->
                        <option value="internal">INTERNAL</option>
                        <option value="BNN">BNN</option>  <!-- Fixed typo: was <optin>, now <option> -->
                        <option value="POLRI">POLRI</option>  <!-- Fixed typo: was <optin>, now <option> -->
                    </select>
                </div>
                <div class="mb-4">
                    <label for="room" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ROOM</label>
                    <input type="text" name="room" id="room" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Ruang Kegiatan" required>
                </div>  
                 <div class="mb-4">
                    <label for="HP" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Temuan HP</label>
                    <input type="number" name="HP" id="HP" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Temuan Handphone" required>
                </div>
                <div class="mb-4">
                    <label for="SAJAM" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Temuan Senjata Tajam</label>
                    <input type="number" name="SAJAM" id="SAJAM" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Temuan Senjata Tajam" required>
                </div> 
                <div class="mb-4">
                    <label for="BARANGELEKTRONIK" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Temuan Barang Elektronik</label>
                    <input type="number" name="BARANGELEKTRONIK" id="BARANGELEKTRONIK" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Temuan Barang Elektronik" required>
                </div>
                <div class="mb-4">
                    <label for="NARKOBA" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Temuan Narkoba</label>
                    <input type="number" name="NARKOBA" id="NARKOBA" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Temuan Narkoba" required>
                </div> 

                <div class="mb-4">
                    <label for="BA" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Berita Acara</label>
                        <textarea id="BA" name="BA" rows="4" 
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border
                         border-gray-300 focus:ring-primary-500 focus:border-primary-500
                          dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                           dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Tulis Berita Acara Disini"></textarea>
                    </div>
                <div class="mb-4">
                    <label for="dok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dokumentasi</label>
                    <input type="text" name="dok" id="dok" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="upload dokumentasi" required>
                </div>  

                <div class="flex gap-2">

                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Add post
                </button>

                @if(Auth::user()->role == 'upt')
                <a href="/upt/odor" class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                    <svg aria-hidden="true" class="w-5 h-5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    Cancel
                </a>
                @endif
                @if(Auth::user()->role == 'kanwil')
                <a href="/kanwil/odor" class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                    <svg aria-hidden="true" class="w-5 h-5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    Cancel
                </a>
                @endif

                </div>

                </div>
            </form>
        </div>

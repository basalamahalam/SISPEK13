@extends('layouts.main')

@section('container')
<section id="sendmenfess" class="pt-36 pb-32 bg-slate-700">
    <div class="container">
        <div class="w-full px-4">
          <div class="max-w-xl mx-auto text-center mb-16">
            <h4 class="font-semibold text-lg text-primary mb-2">Calon Pengurus OSIS & MPK</h4>
            <h2
              class="font-bold text-dark text-2xl mb-4 sm:text-3xl lg:text-4xl dark:text-white tracking-widest"
            >
              FORM PENDAFTARAN
            </h2>
          </div>
        </div>
        <form method="post" action="/" enctype="multipart/form-data" class="form">
          @csrf
          <div class=" py-8 px-6 w-full lg:w-2/3 lg:mx-auto bg-slate-800 rounded-lg">
            <div class="mb-8">
              <div class="flex justify-end items-center">
                  <label for="pendaftar" class="w-1/2 text-base font-bold text-primary"
                  >Pendaftar</label>
                  <label class="text-base font-medium text-white text-right w-1/4">
                      <input
                          type="radio"
                          id="osis"
                          name="pendaftar"
                          value="osis"
                          class="w-5 h-5 mr-2"
                      />
                      OSIS
                  </label>
                  <label class="text-base font-medium text-white text-right w-1/4">
                      <input
                          type="radio"
                          id="mpk"
                          name="pendaftar"
                          value="mpk"
                          class="w-5 h-5 mr-2"
                      />
                      MPK
                  </label>
                  @error('pendaftar')
                    <div class="text-xs text-red-600">{{ $message }}</div>
                    @enderror
              </div>
            </div>
            <div class="mb-8">
              <p class="text-base font-bold text-primary mb-2"
                >Email</p
              >
              <input
                type="text"
                id="email"
                name="email"
                class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus-ring1 focus:border-primary @error('email') border-2 border-red-500 @enderror"
                required
                />
                @error('email')
                    <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-8">
              <p class="text-base font-bold text-primary mb-2"
                >Nama Lengkap</p
              >
              <input
                type="text"
                id="nama"
                name="nama"
                class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus-ring1 focus:border-primary @error('nama') border-2 border-red-500 @enderror"
                required
                />
                @error('nama')
                    <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class=" mb-8 flex justify-between">
              <label for="kelas" class="text-base font-bold text-primary"
                >Kelas</label
              >
              <div class="relative inline-block text-left">
                  <span class="rounded-md shadow-sm">
                    <select name="kelas" id="kelas" class="bg-slate-200 rounded-md shadow-sm p-4 py-2 text-left cursor-pointer focus:outline-none focus:ring focus:border-primary sm:text-sm @error('kelas') border-2 border-red-500 @enderror" >
                      <option selected disabled>Pilih Kelas</option>
                      <option value="X AK 1">X AK 1</option>
                      <option value="X AK 2">X AK 2</option>
                      <option value="X AK 3">X AK 3</option>
                      <option value="X AK 4">X AK 4</option>
                      <option value="X AK 5">X AK 5</option>
                      <option value="X AK 6">X AK 6</option>
                      <option value="X TJKT 1">X TJKT 1</option>
                      <option value="X TJKT 2">X TJKT 2</option>
                      <option value="X TJKT 3">X TJKT 3</option>
                      <option value="X PPLG 1">X PPLG 1</option>
                      <option value="X PPLG 2">X PPLG 2</option>  
                    </select>
                    @error('kelas')
                    <div class="text-xs text-red-600">{{ $message }}</div>
                    @enderror
                  </span>
              </div>
            </div>
            <div class=" mb-8">
              <div class="flex justify-start items-center">
                  <label for="gender" class="w-1/2 text-base font-bold text-primary"
                  >Jenis Kelamin</label>
                  <label class="text-base font-medium text-white text-right w-1/4">
                      <input
                          type="radio"
                          id="laki"
                          name="gender"
                          value="laki"
                          class="w-5 h-5 mr-2"
                          required
                      />
                      Laki-Laki
                  </label>
                  <label class="text-base font-medium text-white text-right w-1/4">
                      <input
                          type="radio"
                          id="perempuan"
                          name="gender"
                          value="perempuan"
                          class="w-5 h-5 mr-2"
                          required
                      />
                  Perempuan
                  </label>
                  @error('gender')
                    <div class="text-xs text-red-600">{{ $message }}</div>
                    @enderror
              </div>
            </div>
            <div class=" mb-8">
              <p class="text-base font-bold text-primary mb-2"
                >No WA</p>
              <input
                type="text"
                id="contact"
                name="contact"
                class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus-ring1 focus:border-primary @error('contact') border-2 border-red-500 @enderror"
                required
                />
                @error('contact')
                    <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-between items-start mb-8">
              <label for="image" class="text-primary text-base font-bold mb-2">Foto</label>
              <div>
                  <input class="text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" name="image" required>
                  <p class="mt-1 text-sm text-gray-500 dark:text-gray-300 text-right" id="file_input_help">PNG, JPG (MAX. 300x400px).</p> 
                  @error('image')
                    <div class="text-xs text-red-600 text-right">{{ $message }}</div>
                  @enderror
              </div>
            </div>
            <div class=" mb-8">
              <p class="text-base font-bold text-primary mb-2"
                >Apa yang kamu ketahui tentang OSIS dan MPK</p>
              <textarea
                type="text"
                id="knowledge"
                name="knowledge"
                class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus-ring1 focus:border-primary h-32 @error('knowledge') border-2 border-red-500 @enderror"
                required
                ></textarea>
                @error('knowledge')
                <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class=" mb-8">
              <p class="text-base font-bold text-primary mb-2"
                >Alasan ingin bergabung OSIS/MPK</p
              >
              <textarea
                type="text"
                id="reason"
                name="reason"
                class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus-ring1 focus:border-primary h-32 @error('reason') border-2 border-red-500 @enderror"
                required
                ></textarea>
                @error('knowledge')
                <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class=" mb-8">
              <p class="text-sm font-small text-white text-justify mb-5"
                >Dengan mengisi Formulir Pendaftaran Pengurus OSIS/MPK ini, maka saya secara sadar dan tanpa 
                paksaan dari pihak manapun, serta atas sepengetahuan dan izin dari orang tua/wali murid 
                untuk mengikuti Pendaftaran Pengurus OSIS/MPK Masa Bhakti 2019-2020.</p>

                <label class="text-sm font-small text-white text-right w-1/4">
                  <input
                      type="radio"
                      id="osis"
                      name="pendaftar"
                      value="osis"
                      class="w-3 h-3 mr-2"
                      required/>
                  Ya, saya setuju
              </label>
            </div>
              <button type="submit" name="submit" 
                class="text-base bg-primary font-bold text-white py-3 px-8 rounded-full w-full hover:opacity-80 hover:shadow-lg transition duration-500">
                Kirim
              </button>
          </div>
        </form>
      </div>
</section>
<script>document.addEventListener("DOMContentLoaded", function () {
    const selectButton = document.querySelector(".form button");
    const optionsList = document.querySelector(".form .origin-top-right");

    selectButton.addEventListener("click", function () {
        optionsList.classList.toggle("hidden");
    });

    optionsList.addEventListener("click", function (e) {
        if (e.target.tagName === "BUTTON") {
            selectButton.textContent = e.target.textContent;
            optionsList.classList.add("hidden");
        }
    });

    // Close options list when clicking outside of it
    document.addEventListener("click", function (e) {
        if (!selectButton.contains(e.target) && !optionsList.contains(e.target)) {
            optionsList.classList.add("hidden");
        }
    });
});</script>
@endsection
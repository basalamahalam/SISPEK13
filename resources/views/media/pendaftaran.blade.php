@extends('layouts.main')

@section('container')
<section id="sendmenfess" class="pb-32 pt-36 bg-slate-700">
    <div class="container">
        <div class="w-full px-4">
          <div class="max-w-xl mx-auto mb-16 text-center">
            <h4 class="mb-2 text-base font-semibold text-primary">Calon Pengurus OSIS & MPK</h4>
            <h2
              class="mb-4 text-2xl font-bold tracking-widest text-dark sm:text-3xl md:text-4xl dark:text-white"
            >
              FORM PENDAFTARAN
            </h2>
          </div>
        </div>
        <form method="post" action="/" enctype="multipart/form-data" class="form">
          @csrf
          <div class="w-full px-6 py-8 rounded-lg lg:w-2/3 lg:mx-auto bg-slate-800">
            <div class="mb-8">
              <div class="items-center justify-between block lg:flex">
                  <label for="pendaftar" class="w-full text-sm font-bold md:text-base md:w-auto text-primary"
                  >Pendaftar</label>
                  <div class="flex items-center justify-end w-auto md:w-1/2">
                  @if(old('pendaftar') == 'osis')
                  <label class="w-auto text-sm font-medium text-right text-white md:text-base md:w-1/4">
                        <input
                            type="radio"
                            id="osis"
                            name="pendaftar"
                            value="osis"
                            class="w-5 h-5 mr-2"
                           checked
                        />
                        OSIS
                      </label>
                      <label class="w-auto ml-6 text-sm font-medium text-right text-white md:text-base md:w-1/4 md:ml-0">
                        <input
                        type="radio"
                        id="mpk"
                        name="pendaftar"
                        value="mpk"
                        class="w-5 h-5 mr-2"
                        />
                        MPK
                      </label>
                  @elseif(old('pendaftar') == 'mpk')
                  <label class="w-auto text-sm font-medium text-right text-white md:text-base md:w-1/4">
                        <input
                        type="radio"
                        id="osis"
                        name="pendaftar"
                        value="osis"
                        class="w-5 h-5 mr-2"
                        />
                        OSIS
                      </label>
                      <label class="w-auto ml-6 text-sm font-medium text-right text-white md:text-base md:w-1/4 md:ml-0">
                        <input
                        type="radio"
                        id="mpk"
                        name="pendaftar"
                        value="mpk"
                        class="w-5 h-5 mr-2"
                        checked
                        />
                        MPK
                      </label>
                  @else
                  <label class="w-auto text-sm font-medium text-right text-white md:text-base md:w-1/4">
                        <input
                        type="radio"
                        id="osis"
                        name="pendaftar"
                        value="osis"
                        class="w-5 h-5 mr-2"
                        />
                        OSIS
                      </label>
                      <label class="w-auto ml-6 text-sm font-medium text-right text-white md:text-base md:w-1/4 md:ml-0">
                        <input
                        type="radio"
                        id="mpk"
                        name="pendaftar"
                        value="mpk"
                        class="w-5 h-5 mr-2"
                        />
                        MPK
                      </label>
                  @endif
                </div>
                  @error('pendaftar')
                    <div class="text-xs text-red-600">{{ $message }}</div>
                    @enderror
              </div>
            </div>
            <div class="mb-8">
              <p class="mb-2 text-sm font-bold md:text-base text-primary"
                >Email</p
              >
              <input
                type="text"
                id="email"
                name="email"
                value = "{{ old('email') }}"
                class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus-ring1 focus:border-primary @error('email') border-2 border-red-500 @enderror"
                required
                />
                @error('email')
                    <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-8">
              <p class="mb-2 text-sm font-bold md:text-base text-primary"
                >Nama Lengkap</p
              >
              <input
                type="text"
                id="nama"
                name="nama"
                value = "{{ (old('nama')) }}"
                class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus-ring1 focus:border-primary @error('nama') border-2 border-red-500 @enderror"
                required
                />
                @error('nama')
                    <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-between mb-8 ">
              <label for="kelas" class="text-sm font-bold md:text-base text-primary"
                >Kelas</label
              >
              <div class="relative inline-block text-left">
                  <span class="rounded-md shadow-sm">
                    <select name="kelas" id="kelas" class="bg-slate-200 rounded-md shadow-sm p-4 py-2 text-left cursor-pointer focus:outline-none focus:ring focus:border-primary sm:text-sm @error('kelas') border-2 border-red-500 @enderror" >
                      <option selected disabled>Pilih Kelas</option>
                      @foreach ($data as $kelas)
                          @if(old('kelas') == $kelas)
                          <option value="{{ $kelas}}" selected>{{ $kelas }}</option>
                          @else
                          <option value="{{ $kelas}}">{{ $kelas }}</option>
                          @endif
                      @endforeach
                    </select>
                    @error('kelas')
                    <div class="text-xs text-red-600">{{ $message }}</div>
                    @enderror
                  </span>
              </div>
            </div>
            <div class="mb-8 ">
              <div class="items-center justify-between block md:flex">
                  <label for="gender" class="w-full text-sm font-bold md:w-auto md:text-base text-primary"
                  >Jenis Kelamin</label>
                  <div class="flex items-center justify-end w-auto mt-2 md:mt-0">
                  @if(old('gender') == 'Laki-Laki')
                  <label class="w-auto mr-5 text-sm font-medium text-right text-white md:mr-0 md:w-1/4 md:text-base">
                      <input
                          type="radio"
                          id="laki"
                          name="gender"
                          value="Laki-Laki"
                          class="w-5 h-5 mr-2"
                          checked
                      />
                      Laki-Laki
                  </label>
                  <label class="w-auto text-sm font-medium text-right text-white md:w-1/4 md:text-base">
                      <input
                          type="radio"
                          id="perempuan"
                          name="gender"
                          value="Perempuan"
                          class="w-5 h-5 mr-2"
                      />
                  Perempuan
                  </label>
                  @elseif(old('gender') == 'Perempuan')
                  <label class="w-auto mr-5 text-sm font-medium text-right text-white md:mr-0 md:w-1/4 md:text-base">
                    <input
                        type="radio"
                        id="laki"
                        name="gender"
                        value="Laki-Laki"
                        class="w-5 h-5 mr-2"
                    />
                    Laki-Laki
                </label>
                <label class="w-auto text-sm font-medium text-right text-white md:w-1/4 md:text-base">
                    <input
                        type="radio"
                        id="perempuan"
                        name="gender"
                        value="Perempuan"
                        class="w-5 h-5 mr-2"
                        checked
                    />
                Perempuan
                </label>
                  @else
                  <label class="w-auto mr-5 text-sm font-medium text-right text-white md:mr-0 md:w-1/4 md:text-base">
                    <input
                        type="radio"
                        id="laki"
                        name="gender"
                        value="Laki-Laki"
                        class="w-5 h-5 mr-2"
                    />
                    Laki-Laki
                </label>
                <label class="w-auto text-sm font-medium text-right text-white md:w-1/4 md:text-base">
                    <input
                        type="radio"
                        id="perempuan"
                        name="gender"
                        value="Perempuan"
                        class="w-5 h-5 mr-2"
                    />
                Perempuan
                </label>
                  @endif
              </div>
                  @error('gender')
                    <div class="text-xs text-red-600">{{ $message }}</div>
                    @enderror
              </div>
            </div>
            <div class="mb-8 ">
              <p class="mb-2 text-sm font-bold md:text-base text-primary"
                >No WA</p>
              <input
                type="text"
                id="contact"
                name="contact"
                value= "{{ old('contact') }}"
                class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus-ring1 focus:border-primary @error('contact') border-2 border-red-500 @enderror"
                required
                />
                @error('contact')
                    <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="items-start justify-between block mb-8 md:flex">
              <label for="image" class="mb-2 text-sm font-bold md:text-base text-primary">Foto 3x4</label>
              <div class="mt-2 md:mt-0">
                <h1 class="sr-only">Choose file</h1>
                <input class="block w-full text-sm bg-gray-300 border border-gray-200 rounded-lg shadow-sm cursor-pointer focus:z-10 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-400 file:border-0 file:me-4 file:py-3 file:px-4" onchange="previewImage()" aria-describedby="file_input_help" id="file_input" type="file" name="image" required>
                <p class="mt-1 text-sm text-right text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG (MAX. 512kb).</p> 
                  @error('image')
                    <div class="text-xs text-right text-red-600">{{ $message }}</div>
                  @enderror
              </div>
            </div>
            <div class="mb-8 ">
              <p class="mb-2 text-sm font-bold md:text-base text-primary"
                >Apa yang kamu ketahui tentang OSIS dan MPK</p>
              <textarea
                type="text"
                id="knowledge"
                name="knowledge"
                class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus-ring1 focus:border-primary h-32 @error('knowledge') border-2 border-red-500 @enderror"
                required
                >{{ old('knowledge') }}</textarea>
                @error('knowledge')
                <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-8 ">
              <p class="mb-2 text-sm font-bold md:text-base text-primary"
                >Alasan ingin bergabung OSIS/MPK</p
              >
              <textarea
                type="text"
                id="reason"
                name="reason"
                class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus-ring1 focus:border-primary h-32 @error('reason') border-2 border-red-500 @enderror"
                required
                >{{ old('reason') }}</textarea>
                @error('reason')
                <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-8 ">
              <p class="mb-5 text-sm text-justify text-white font-small"
                >Dengan mengisi Formulir Pendaftaran Pengurus OSIS/MPK ini, maka saya secara sadar dan tanpa 
                paksaan dari pihak manapun, serta atas sepengetahuan dan izin dari orang tua/wali murid 
                untuk mengikuti Pendaftaran Pengurus OSIS/MPK Masa Bhakti 2019-2020.</p>

                <label class="w-1/4 text-sm text-right text-white font-small">
                  <input
                      type="radio"
                      class="w-3 h-3 mr-2"
                      required/>
                  Ya, saya setuju
                </label>
            </div>
              <button type="submit" name="submit" 
                class="w-full px-8 py-3 text-sm font-bold text-white transition duration-500 rounded-full md:text-base bg-primary hover:opacity-80 hover:shadow-lg">
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
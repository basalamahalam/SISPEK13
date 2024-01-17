<span class="absolute text-white text-4xl top-5 left-4 cursor-pointer" onclick="Openbar()">
    <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
  </span>
  <div class="sidebar fixed top-0 bottom-0 lg:left-0 left-[-300px] duration-1000
    p-2 w-[250px] overflow-y-auto text-center bg-dark shadow h-screen">
    <div class="text-gray-100 text-xl">
        <div class="p-2.5 mt-1 flex items-center justify-between rounded-md ">
            <div class="text-left">
                <h1 class="text-xl text-gray-200 font-bold">SISPEK 13</h1>
                <p class="text-xs text-gray-200 font-medium">Halaman Admin {{ auth()->user()->name }}</p>
            </div>
            <i class="bi bi-x ml-20 cursor-pointer lg:hidden" onclick="Openbar()"></i>
        </div>
      <hr class="my-2 text-gray-600">

      <div>
        <a href="/dashboard" class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-blue-600">
          <i class="bi bi-grid"></i>
          <span class="text-[15px] ml-4 text-gray-200">Dashboard</span>
        </a>
        @can('osis')
          <div class="p-2.5 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 ">
            <i class="bi bi-people-fill"></i>
            <div class="flex justify-between w-full items-center" onclick="dropDown()">
              <span class="text-[15px] ml-4 text-gray-200">OSIS</span>
              <span class="text-sm rotate-180" id="arrowOSIS">
                <i class="bi bi-chevron-down"></i>
              </span>
            </div>
          </div>
          <div class=" leading-7 text-left text-sm font-thin mt-2 w-4/5 mx-auto" id="OSIS">
            <a href="/profil-osis"><h1 class="cursor-pointer p-1.5 hover:bg-gray-700 rounded-md">Profil</h1></a>
            <a href="/jurnal-admin"><h1 class="cursor-pointer p-1.5 hover:bg-gray-700 rounded-md">Jurnal</h1></a>
            <a href="/berita-admin"><h1 class="cursor-pointer p-1.5 hover:bg-gray-700 rounded-md">Berita</h1></a>
            <a href="/pendaftar-osis"><h1 class="cursor-pointer p-1.5 hover:bg-gray-700 rounded-md">Pendaftar</h1></a>
          </div>
        @endcan
        @can('mpk')
          <div class="p-2.5 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600">
            <i class="bi bi-people"></i>
            <div class="flex justify-between w-full items-center" onclick="dropDown2()">
              <span class="text-[15px] ml-4 text-gray-200">MPK</span>
              <span class="text-sm rotate-180" id="arrowMPK">
                <i class="bi bi-chevron-down"></i>
              </span>
            </div>
          </div>
          <div class=" leading-7 text-left text-sm font-thin mt-2 w-4/5 mx-auto" id="MPK">
            <a href="/profil-mpk"><h1 class="cursor-pointer p-1.5 hover:bg-gray-700 rounded-md">Profil</h1></a>
            <a href="/menfess-admin"><h1 class="cursor-pointer p-1.5 hover:bg-gray-700 rounded-md">Menfess</h1></a>
            <a href="/ekskul-admin"><h1 class="cursor-pointer p-1.5 hover:bg-gray-700 rounded-md">Ekstrakurikuler</h1></a>
            <a href="/pendaftar-mpk"><h1 class="cursor-pointer p-1.5 hover:bg-gray-700 rounded-md">Pendaftar</h1></a>
          </div>
        @endcan
        <hr class="my-2 text-gray-600">
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="w-full p-2.5 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600">
              <i class="bi bi-box-arrow-in-right"></i>
              <span class="text-[15px] ml-4 text-gray-200">Logout</span>
            </button>
      </form>
      </div>
    </div>
  </div>

  <script>
    function dropDown() {
      document.querySelector('#OSIS').classList.toggle('hidden')
      document.querySelector('#arrowOSIS').classList.toggle('rotate-0')
    }
    dropDown()

    function Openbar() {
      document.querySelector('.sidebar').classList.toggle('left-[-300px]')
    }

    function dropDown2(){
      document.querySelector('#MPK').classList.toggle('hidden')
      document.querySelector('#arrowMPK').classList.toggle('rotate-0')
    }
    dropDown2()
  </script>
</body>
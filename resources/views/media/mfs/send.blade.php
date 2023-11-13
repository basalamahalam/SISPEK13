@extends('layouts.main')

@section('container')
  <section id="sendmenfess" class="pt-36 pb-32 bg-slate-700">
      <div class="container">
          <div class="w-full px-4">
            <div class="max-w-xl mx-auto text-center mb-16">
              <h4 class="font-semibold text-lg text-primary mb-2 tracking-[0.3rem]">SECRET MESSAGE</h4>
              <h2
                class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl dark:text-white tracking-widest"
              >
                KIRIM MENFESS.
              </h2>
            </div>
          </div>
          <form method="post" action="/menfess" enctype="multipart/form-data">
            @csrf
            <div class="w-full px-4 mb-8 lg:w-2/3 lg:mx-auto">
              <label for="from" class="text-base font-bold text-primary"
                >Dari</label
              >
              <input
                type="text"
                id="name"
                name="from"
                class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus-ring1 focus:border-primary"
                required
                />
            </div>
            <div class="w-full px-4 mb-8 lg:w-2/3 lg:mx-auto">
              <label for="to" class="text-base font-bold text-primary"
                >Untuk</label
              >
              <input
                type="text"
                id="named"
                name="to"
                class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus-ring1 focus:border-primary"
                required
                />
            </div>
            <div class="w-full px-4 mb-8 lg:w-2/3 lg:mx-auto">
              <label for="message" class="text-base font-bold text-primary"
                >Pesan</label
              >
              <textarea
                type="text"
                id="message"
                name="message"
                class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus-ring1 focus:border-primary h-32"
                required
                ></textarea>
            </div>
            <div class="w-full px-4 lg:w-2/3 lg:mx-auto">
              <button type="submit" name="submit" 
                class="text-base bg-primary font-bold text-white py-3 px-8 rounded-full w-full hover:opacity-80 hover:shadow-lg transition duration-500"
              >
                Kirim
              </button>
            </div>
          </form>
        </div>
  </section>
@endsection
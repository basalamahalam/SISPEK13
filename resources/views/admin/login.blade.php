<!doctype html>
<html class="scroll-smooth">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="bg-dark">
    <div class="pt-36 px-32">
        @if(session()->has('success'))
            <div class="w-1/2 flex justify-between mx-auto bg-green-100 border-l-4 border-green-500 text-green-700 p-4 relative" role="alert">
                {{ session('success') }}
                <button
                    class=" text-green-600 hover:text-green-400 font-bold text-medium"
                    onclick="this.parentElement.style.display='none'"
                >
                    X
                </button>
            </div>
        @elseif(session()->has('is-errors'))
        <div class="w-1/2 flex justify-between mx-auto bg-red-100 border-l-4 border-red-500 text-red-700 p-4 relative" role="alert">
            {{ session('is-errors') }}
            <button
                class=" text-red-600 hover:text-red-400 font-bold text-medium"
                onclick="this.parentElement.style.display='none'"
            >
                X
            </button>
        </div>
        @endif
        <form method="POST" action="/login">
            @csrf
            <div class="bg-white rounded-lg p-4 w-1/2 mx-auto">
                <div class="container mb-10 mt-3">
                    <p class="text-2xl font-bold text-dark">Login Admin!</p>
                </div>
                <div class="container mb-5">
                    <label for="email" class="text-base font-bold text-dark">Username</label>
                    <div class="">
                    <input type="email" name="email" class="bg-slate-300 rounded-lg w-full p-3 @error('email') border-red-500 @enderror" value ="{{ old('email') }}" placeholder="Masukkan Email" autofocus required>
                    @error('email')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                    </div>
                </div>
                <div class="container mb-10">
                    <label for="password" class="text-base font-bold text-dark">Password</label>
                    <div class="">
                    <input type="password" name="password" class="bg-slate-300 rounded-lg w-full p-3 @error('password') border-red-500 @enderror" placeholder="Masukkan Password" autofocus required>
                    @error('password')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                    </div>
                </div>
                <div class="container mb-5">
                    <button type="submit" name="submit" 
                    class="text-base bg-primary font-bold text-white py-3 px-8 rounded-full w-full hover:opacity-80 hover:shadow-lg transition duration-500">
                    Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="../js/script.js"></script>
</html>
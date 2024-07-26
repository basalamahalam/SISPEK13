<!doctype html>
<html class="scroll-smooth">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="bg-dark">
    <div class="px-32 pt-36">
        @if(session()->has('success'))
            <div id="success-message" class="relative flex justify-between w-1/2 p-4 mx-auto text-green-700 bg-green-100 border-l-4 border-green-500" role="alert">
                {{ session('success') }}
                <button
                    class="font-bold text-green-600 hover:text-green-400 text-medium"
                    onclick="this.parentElement.style.display='none'"
                >
                    X
                </button>
            </div>
            <script>
                setTimeout(() => {
                var successMessage = document.getElementById('success-message');
                if(successMessage){
                    successMessage.style.display = 'none';
                }
            }, 3000);
            </script>
        @elseif(session()->has('is-errors'))
        <div id="error-message" class="relative flex justify-between w-1/2 p-4 mx-auto text-red-700 bg-red-100 border-l-4 border-red-500" role="alert">
            {{ session('is-errors') }}
            <button
                class="font-bold text-red-600 hover:text-red-400 text-medium"
                onclick="this.parentElement.style.display='none'"
            >
                X
            </button>
        </div>

        <script>
            setTimeout(() => {
                var successMessage = document.getElementById('error-message');
                if(successMessage){
                    successMessage.style.display = 'none';
                }
            }, 3000);
        </script>
        @endif
        <form method="POST" action="/login">
            @csrf
            <div class="w-1/2 p-4 mx-auto bg-white rounded-lg">
                <div class="container mt-3 mb-10">
                    <p class="text-2xl font-bold text-dark">Login Admin!</p>
                </div>
                <div class="container mb-5">
                    <label for="email" class="text-base font-bold text-dark">Username</label>
                    <div class="">
                    <input type="email" name="email" class="bg-slate-300 rounded-lg w-full p-3 @error('email') border-red-500 @enderror" value ="{{ old('email') }}" placeholder="Masukkan Email" autofocus required>
                    @error('email')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                    </div>
                </div>
                <div class="container mb-10">
                    <label for="password" class="text-base font-bold text-dark">Password</label>
                    <div class="">
                    <input type="password" name="password" class="bg-slate-300 rounded-lg w-full p-3 @error('password') border-red-500 @enderror" placeholder="Masukkan Password" autofocus required>
                    @error('password')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                    </div>
                </div>
                <div class="container mb-5">
                    <button type="submit" name="submit" 
                    class="w-full px-8 py-3 text-base font-bold text-white transition duration-500 rounded-full bg-primary hover:opacity-80 hover:shadow-lg">
                    Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="../js/script.js"></script>
</html>
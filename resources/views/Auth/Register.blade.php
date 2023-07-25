<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    {{-- <script src="{{ v('js/app.js') }}"></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-200 w-screen h-screen flex justify-center items-center">

    <div
        class="bg-white/70 w-[80%] md:w-[40%] xl:w-[30%] h-[70%] rounded-2xl shadow-lg shadow-black/30 drop-shadow-2xl  border-black border-opacity-30 border-s-fuchsia-300 ">
        <form action="{{ route('registration') }}" method="POST">
            {{-- CSRF Token --}}
            @csrf
            <div class="w-full h-full flex flex-col p-2 items-center">
                <div class="mt-6">
                    <p class="text-xl uppercase font-semibold">Register an account</p>
                </div>
                <div class=" w-full mt-5 space-y-5">
                    <div class="bg-white rounded-2xl h-10 w-full p-2 flex flex-row items-center gap-2 drop-shadow-lg">
                        <div class="" value="">
                            <img src="{{ asset('images/user.png') }}" class="w-4 h-4 " alt="">
                        </div>
                        <div class="w-full h-full">
                            <input type="text" name="name" class="w-full h-full outline-none text-lg" placeholder="Name">
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl h-10 w-full p-2 flex flex-row items-center gap-2 drop-shadow-lg">
                        <div class="" value="">
                            <img src="{{ asset('images/email.png') }}" class="w-4 h-4 " alt="">
                        </div>
                        <div class="w-full h-full">
                            <input type="email" name="email" class="w-full h-full outline-none text-lg" placeholder="email">
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl h-10 w-full p-2 flex flex-row items-center gap-2 drop-shadow-lg">
                        <div class="" value="">
                            <img src="{{ asset('images/password.png') }}" class="w-4 h-4 " alt="">
                        </div>
                        <div class="w-full h-full">
                            <input type="password" name="password" class="w-full h-full outline-none text-lg" placeholder="*******">
                        </div>
                    </div>


                </div>
                <div class="w-full flex items-center justify-center mt-10">
                    <button
                        class="bg-white p-2 w-1/2 rounded-xl text-lg uppercase drop-shadow-2xl font-semibold">Register</button>
                </div>
            </div>
        </form>
    </div>


</body>

</html>

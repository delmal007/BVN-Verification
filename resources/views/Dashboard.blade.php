<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify BVN</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-200 w-screen h-screen flex justify-center items-center static">

    <div
        class="z-0 bg-white/70 w-[80%] md:w-[40%] xl:w-[30%] h-[70%] rounded-2xl shadow-lg shadow-black/30 drop-shadow-2xl  border-black border-opacity-30 border-s-fuchsia-300 ">
        <div class="w-full h-full flex flex-col p-2 items-center">
            <form action="{{ route('verify') }}" method="POST">
                {{-- CSRF Token --}}
                @csrf
                <div class="mt-6">
                    <p class="text-xl uppercase font-semibold">VERIFY BVN</p>
                </div>
                <div class=" w-full  space-y-5 mt-10">
                    @if ($errors->any())
                        <div class="text-red-500">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="bg-white rounded-2xl h-10 w-full p-2 flex flex-row items-center gap-2 drop-shadow-lg">
                        <div class="">
                            <img src="{{ asset('images/bank.png') }}" class="w-4 h-4 " alt="">
                        </div>
                        <div class="w-full h-full">
                            <input type="text" name="bvn" class="w-full h-full outline-none text-lg"
                                placeholder="Enter your BVN">
                        </div>
                    </div>



                </div>
                <div class="w-full flex items-center justify-center mt-10">
                    <button
                        class="bg-white p-2 w-1/2 rounded-xl text-lg uppercase drop-shadow-2xl font-semibold">Verify</button>
                </div>
            </form>
        </div>


    </div>


</body>

</html>

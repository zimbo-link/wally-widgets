<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wally\'s Widgets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">




            <div class="grid grid-cols-5 gap-3">
                <div>
                    <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
                        <form method="POST" action="{{ route('widgets') }}">
                            @csrf
                            @if ($errors->any())
                                <div >
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li class="text-red-500">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group mb-6">
                                <label for="exampleInputEmail1"
                                    class="form-label inline-block mb-2 text-gray-700">Number of Units</label>
                                <input type="number" class="form-control
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    id="units" name="units" aria-describedby="emailHelp" placeholder="Enter number" value="{{ isset($units) ? $units : 0 }}">
                                <small id="unitsHelp" class="block mt-1 text-xs text-gray-600">Enter the number of units
                                    you would like to order</small>
                            </div>


                            <button type="submit" class="
                            px-6
                            py-2.5
                            bg-blue-600
                            text-white
                            font-medium
                            text-xs
                            leading-tight
                            uppercase
                            rounded
                            shadow-md
                            hover:bg-blue-700 hover:shadow-lg
                            focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                            active:bg-blue-800 active:shadow-lg
                            transition
                            duration-150
                            ease-in-out">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="block p-6 rounded-lg shadow-lg bg-white">
                        <h3 class="inline-block mb-2 text-gray-700">Packs to send:</h3>
                        <ul>
                        @if(isset($units))
                            @foreach($send as $s)
                                <li><b>Pack Size:</b> {{ $s['size'] }}, <b>Quantity:</b> {{ $s['quantity'] }}</li>
                            @endforeach
                        @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>



    </div>
</x-app-layout>

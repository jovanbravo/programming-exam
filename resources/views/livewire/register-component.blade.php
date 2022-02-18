<div>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
            <h3 class="text-2xl font-bold text-center">Register</h3>


            <form method="POST" action="{{ route('auth_register') }}">
                @csrf
                <div class="mt-8">

                    <div class="mt-4 ">
                        <label class="block" for="typeName">Choose type:<label>
                                <select wire:model="typeName" name="type"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                    style="margin-left: 20px!important">
                                    <option value="">Choose type</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">
                                            {{ ucfirst(str_replace('_', ' ', $type->type_name)) }}</option>
                                    @endforeach
                                </select>

                    </div>
                    <div class="mt-4">
                        <label class="block" for="subtypeName">Choose subtype:<label>
                                <select wire:model='subtypeName' name="subtype"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                    style="margin-left: 20px!important">
                                    <option value="">Choose subtype </option>
                                    @foreach ($subtypes as $subtype)
                                        <option value="{{ $subtype->id }}">{{ $subtype->type_name }}
                                        </option>
                                    @endforeach
                                </select>

                    </div>

                    <div class="mt-4">
                        <label class="block" for="subtypeName">Choose subsubtype:<label>
                                <select name="subsubtype"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                    style="margin-left: 20px!important">
                                    <option value="">Choose subsubtype </option>
                                    @foreach ($subsubtypes as $subtype)
                                        <option value="{{ $subtype->id }}">{{ $subtype->type_name . $subtype->id }}
                                        </option>
                                    @endforeach
                                </select>

                    </div>
                </div>



                <div class="mt-4">
                    <label class="block" for="Name">Name<label>
                            <input type="text" name="name" placeholder="Name"
                                class="  w-36 px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                style="margin-left: 20px!important">

                </div>
                <div class="mt-4">
                    <label class="block" for="email">Email<label>
                            <input type="text" name="email" placeholder="Email"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                style="margin-left: 20px!important">


                </div>



                <div class="mt-4">
                    <label class="block">Password<label>
                            <input type="password" name="password" placeholder="Password"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                style="margin-left: 20px!important">

                </div>
                <div class="mt-4">
                    <label class="block">Confirm Password<label>
                            <input type="password" name="password_confirm" placeholder="Password"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                style="margin-left: 20px!important">

                </div>

                <div>
                    @if ($errors->any())
                        {!! implode('', $errors->all('<div class="text-left text-red-600 mx-3 my-3">:message</div>')) !!}
                    @endif
                </div>

                <div class="flex items-baseline justify-between">
                    <button type="submit"
                        class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Register</button>
                    <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">Login</a>
                </div>
        </div>
        </form>
    </div>
</div>
</div>

<div>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="px-8 py-3 mt-12 text-left bg-white shadow-lg">
            <h3 class="text-2xl font-bold text-center">Login to your account</h3>
            <form method="get" action="{{ route('auth_login') }}">
                {{ csrf_field() }}
                <div class="mt-4">
                    <div>
                        <label class="block" for="email">Email<label>
                                <input type="email" name="email" placeholder="Email"
                                    class="w-36 px-6 mx-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">

                    </div>
                    <div class="mt-5">
                        <label class="block">Password<label>
                                <input type="password" name="password" placeholder="Password"
                                    class="w-36 px-4 py-2 mx-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                    style="margin-left: 20px!important">

                    </div>

                    <div>
                        @if ($errors->any())
                            {!! implode('', $errors->all('<div class="text-left text-red-600 mx-3 my-3">:message</div>')) !!}
                        @endif
                    </div>
                    <div class="flex items-baseline justify-between">
                        <button type="submit"
                            class="px-6 py-2 mt-5 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Login</button>
                        <a href="{{ route('register') }}" class="text-sm text-blue-600 hover:underline">Register</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

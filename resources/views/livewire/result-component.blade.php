<div>
    <h2 class="text-3xl py-3 px-3 text-center mt-5"> Welcome {{ Auth::user()->name }} to the dashboard page </h2>

    <div class="box ">

        <div class="p-5 shadow mt-2">

            @foreach ($totalTypes as $type)
                <div class="p-2">
                    <button class="type-button" wire:click.prevent="getUsers({{ $type['id'] }})">

                        {{ ucfirst(str_replace('_', ' ', $type['type_name'])) .'(' .\App\Http\Livewire\ResultComponent::countType($type['id']) .')' }}

                    </button><button class="types text-2xl px-1">+</button>

                    <div class="subtypes ">
                        @foreach ($type['children'] as $subtype)
                            <div class="col-md-4">
                                <button wire:click="getUsers({{ $subtype['id'] }})" class="p-2 ml-3">
                                    {{ $subtype['type_name'] . '(' . \App\Http\Livewire\ResultComponent::countSubtype($subtype['id']) . ')' }}


                                </button><button class="subtype-button text-2xl px-1">+</button>


                                <div class="subsubtypes ">
                                    @foreach ($subtype['children'] as $subsubtype)
                                        <button wire:click="getUsers('{{ $subsubtype['id'] }}')"
                                            class="p-2 ml-5">

                                            {{ $subsubtype['type_name'] .'(' .\App\Http\Livewire\ResultComponent::countSubsubtype($subsubtype['id']) .')' }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>
            @endforeach

        </div>

        <div class="px-2 w-full ">
            @if ($users)
                <div class=" flex justify-center mx-auto my-4 w-full">
                    <div class="flex flex-col w-full">
                        <div class="">
                            <div class="border-b border-gray-200 shadow w-2/4 mx-12"
                                style="margin: 0 3rem!important; border: 1px solid lightgray">
                                <table class="w-full" style="width: 50rem">
                                    <thead class="bg-gray-50 " style="">
                                        <tr class=" b-2 ">

                                            <th class="px-6 py-2 text-xs text-gray-500">
                                                Full Name
                                            </th>
                                            <th class="px-6 py-2 text-xs text-gray-500">
                                                Type
                                            </th>
                                            <th class="px-6 py-2 text-xs text-gray-500">
                                                Subtype
                                            </th>
                                            <th class="px-6 py-2 text-xs text-gray-500">
                                                Subsubtype
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        @forelse ($users as $user)
                                            <tr class="whitespace-nowrap">

                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-900">
                                                        {{ $user->name }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-500">
                                                        {{ ucfirst(str_replace('_', ' ', $user->type_name)) }}</div>
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    {{ $user->subtype_name }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $user->subsubtype_name }}
                                                </td>
                                            @empty
                                                <td class="px-6 py-4">
                                                    No results
                                                </td>
                                        @endforelse

                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



            @endif








            @livewire('search-result-component', ['searchs'=>$searchs])
        </div>


    </div>
    <script>
        $(document).ready(function() {
            $('.subsubtypes').hide();
            $(".types").click(function() {

                var types = $(this).siblings('.subtypes').slideToggle('slow');
            });

            $(".subtype-button").click(function() {
                var subtypes = $(this).siblings('.subsubtypes').slideToggle('slow');

            });
            $('.type-button').click(function() {
                $('.searchs').hide();
            });
        });
    </script>
</div>

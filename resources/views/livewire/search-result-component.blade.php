<div>
    @if ($searchs)
        <div class=" flex justify-center mx-auto my-4 w-full searchs">
            <div class="flex flex-col w-full">
                <div class="">
                    <div class="border-b border-gray-200 shadow w-2/4 mx-12"
                        style="margin: 0 3rem!important; border: 1px solid lightgray">
                        <table class="w-full" style="width: 50rem">
                            <thead class="bg-gray-50 " style="">
                                <tr>
                                    <th colspan="4">
                                        <h2 class="mx-5 py-2 text-center text-2xl pb3">Search Results</h2>
                                    </th>
                                </tr>
                                <tr style="border: 1px solid lightgray">


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
                                @forelse ($searchs as $search)
                                    <tr class="whitespace-nowrap">

                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{ $search->name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-500">
                                                {{ ucfirst(str_replace('_', ' ', $search->type_name)) }}</div>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $search->subtype_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $search->subsubtype_name }}
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
</div>

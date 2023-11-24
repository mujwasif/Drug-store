<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Item List / Add') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white-900 dark:text-gray-100">

                    @if (session('sattus'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ url('review/insert') }}" class="max-w-sm mx-auto">
                        @csrf
                        <div class="mb-5">
                            <label for="Comment"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Comment</label>
                            <input name="comments" type="text"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <input value='{{ $item_id }}' type= 'hidden' name='item_id'/>
                        </div>


                        <div class="mb-5">
                            <label for="Type"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Rating</label>
                            <select name="rating" id="type"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                
                            
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    {{--<div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                    <table class="w-full text-white-500 dark:text-gray-400">
                        <thead
                            class=" font-medium text-white-900 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Item name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Details
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Type
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Selling Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Real Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Generic Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Dealer Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Company Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Quantity
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Strength
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Stock
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Added_by
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Added At
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr @if ($item->item_stock < 5) class="bg-red-600" @endif>
                                    <th scope="row"
                                    class="px-6 py-4 font-medium text-white-900 whitespace-nowrap">
                                    {{ $item->item_name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->item_details }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->item_type }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->item_sell_price }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->item_real_price }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->item_generic_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->item_dealer_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->item_company_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->item_quantity }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->item_strength }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->item_stock }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ App\Models\User::find($item->item_added_by)->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->created_at }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>--}}
</x-app-layout>

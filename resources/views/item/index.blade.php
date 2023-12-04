<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Item List / Add') }}
        </h2>
    </x-slot>


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
                    <form method="POST" action="{{ url('item/insert') }}" class="max-w-sm mx-auto">
                        @csrf
                        <div class="mb-5">
                            <label for="Name"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Item Name</label>
                            <input name="item_name" type="text"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        <div class="mb-5">
                            <label for="Details"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Item
                                Details</label>
                            <input name="item_details" type="text"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        <div class="mb-5">
                            <label for="Type"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Item Type</label>
                            <select name="item_type" id="type"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose a Type</option>
                                <option value="tablet">Tablet/Capsule</option>
                                <option value="liquid">Liquid</option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="Selling_Price"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Item
                                Selling Price</label>
                            <input name="item_sell_price" type="text"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        <div class="mb-5">
                            <label for="Buying_Price"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Item
                                Buying Price</label>
                            <input name="item_real_price" type="text"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        <div class="mb-5">
                            <label for="Generic_Name"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Item
                                Generic Name</label>
                            <input name="item_generic_name" type="text"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        <div class="mb-5">
                            <label for="Dealer_Name"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Item
                                Dealer Name</label>
                            <input name="item_dealer_name" type="text"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        <div class="mb-5">
                            <label for="Company_Name"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Item
                                Company Name</label>
                            <input name="item_company_name" type="text"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        <div class="mb-5">
                            <label for="Quantity"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Item
                                Quantity Per Unit</label>
                            <input name="item_quantity" type="text"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        <div class="mb-5">
                            <label for="Strength"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Item
                                Strength ( ml / mg )</label>
                            <input name="item_strength" type="text"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        <div class="mb-5">
                            <label for="Stock"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Item
                                Stock</label>
                            <input name="item_stock" type="text"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Add
                            Item</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
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
    </div>
</x-app-layout>

<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-8 text-2xl">
        Items
    </div>
{{-- Table Starts Here..! --}}
    <div class="mt-6">

        <div class="flex justify-between"></div>
        <div></div>

        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">
                        <div class="flex items-center">ID</div>
                    </th>

                    <th class="px-4 py-2">
                        <div class="flex items-center">Name</div>
                    </th>

                    <th class="px-4 py-2">
                        <div class="flex items-center">Price</div>
                    </th>

                    <th class="px-4 py-2">
                        <div class="flex items-center">Status</div>
                    </th>

                    <th class="px-4 py-2">
                        <div class="flex items-center">Action</div>
                    </th>

                </tr>
            </thead>

            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td class="border px-4 py-2">{{$item->id}}</td>
                        <td class="border px-4 py-2">{{$item->name}}</td>
                        <td class="border px-4 py-2">{{$item->price, 2}}</td>
                        <td class="border px-4 py-2">{{$item->status ? 'Active' : 'Not Active'}}</td>
                        <td class="border px-4 py-2">Edit Delete </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
{{--Table Ends Here..!--}}

    {{--Pagination--}}
    <div class="mt-4">
        {{$items->links()}}
    </div>

</div>

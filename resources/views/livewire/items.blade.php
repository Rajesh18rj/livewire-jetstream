<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-8 text-2xl flex justify-between">
        <div>
            Item
        </div>
        <div class="mr-2">
            <x-button wire:click="confirmItemAdd">
                {{ __('Add New Item') }}
            </x-button>
        </div>

    </div>
{{-- Table Starts Here..! --}}

    <div class="mt-6">

        <div class="flex justify-between">
        <div class="">
            <input wire:model.live="q" type="search" placeholder="search" class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"/>

        </div>
            <div class="mr-2">
                <input type="checkbox" class="mr-2 leading-tight" wire:model="active" />Active Only?
            </div>

        </div>

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

                    @if(!$active)
                        <th class="px-4 py-2">
                            <div class="flex items-center">Status</div>
                        </th>
                    @endif

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

                        @if(!$active)
                        <td class="border px-4 py-2">{{$item->status ? 'Active' : 'Not Active'}}</td>
                        @endif

                        <td class="border px-4 py-2">Edit
                            <x-danger-button wire:click="confirmItemDeletion({{$item->id}})" wire:loading.attr="disabled">
                            Delete
                            </x-danger-button>
                        </td>
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

    <!-- Delete User Confirmation Modal -->
    <x-dialog-modal wire:model.live="confirmingItemDeletion">
        <x-slot name="title">
            {{ __('Delete Item') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete your Item? ') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingItemDeletion', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3" wire:click="deleteItem({{$confirmingItemDeletion}})" wire:loading.attr="disabled">
                {{ __('Delete Item') }}
            </x-danger-button>
        </x-slot>

    </x-dialog-modal>

    <!-- Delete User Confirmation Modal -->
    <x-dialog-modal wire:model.live="confirmingItemAdd">
        <x-slot name="title">
            {{ __('Add Item') }}
        </x-slot>

        <x-slot name="content">

            <!-- Name -->
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" type="text" class="mt-1 block w-full" wire:model="item.name" />
                <x-input-error for="item.name" class="mt-2" />
            </div>

            <!-- Price -->
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="price" value="{{ __('Price') }}" />
                <x-input id="name" type="text" class="mt-1 block w-full" wire:model="item.price" />
                <x-input-error for="item.price" class="mt-2" />
            </div>

            <!-- Checkbox -->
            <div class="col-span-6 sm:col-span-4 mt-4">
                <label for="" class="flex items-center">
                    <input type="checkbox" wire:model.defer="item.status" class="form-checkbox">
                    <span class="ml-2 text-sm text-gray-600">Active</span>
                </label>
                </div>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingItemAdd', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3" wire:click.prevent="saveItem()" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-danger-button>
        </x-slot>

    </x-dialog-modal>

</div>

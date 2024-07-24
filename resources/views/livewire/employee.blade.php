<div>
    {{-- @if (session('success'))
        <span class="px-3 py-3 bg-green-600 text-white rounded">{{ session('success') }}</span>
    @endif

    <form class="p-5" wire:submit="createNewEmployee" action="">
        @csrf
        <label>Name</label>
        <input name="name" class="block rounded border border-gray-100 px-3 py-1 mb-1" wire:model.live="name"
            type="text" placeholder="name">
        @error('name')
            <p class="text-red-500 text-xs">{{ $message }}</p>
        @enderror
        <label>Division</label>
        <input class="block rounded border border-gray-100 px-3 py-1 mb-1" wire:model.live="division" type="text"
            placeholder="division">
        @error('division')
            <p class="text-red-500 text-xs">{{ $message }}</p>
        @enderror

        <button class="block rounded px-3 py-1 bg-gray-400 text-white">Create</button>
    </form>

    <hr> --}}

    <section class="mt-10">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">

            <div class="overflow-hidden">
                <div class="flex items-center justify-between d p-4">
                    <div class="flex">
                        <div class="relative w-full">
                            <input wire:model.live.debounce.300ms="search" type="text"
                                class="bg-gray-50 border border-gray-300" placeholder="Search..." required="">

                        </div>

                    </div>

                </div>
                <div class="overflow-x-auto border rounded-lg">
                    <table class=" w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase">
                            <tr>
                                <th wire:click="doSort ('name')" class="px-4 py-3 border-b dark:border-gray-700">
                                    <x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="name" />
                                </th>
                                <th wire:click="doSort ('division')" class="px-4 py-3 border-b dark:border-gray-700">
                                    <x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="division" />
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr class="border-b dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-neutral-300">
                                    <th class="px-4 py-3">{{ $employee->name }}</th>
                                    <th class="px-4 py-3">{{ $employee->division }}</th>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
                <div class="py-4 px-3">
                    <div class="flex">
                        <div class="flex space-x-4 items-center mb-3">
                            <label>Per Page</label>
                            <select wire:model.live='perPage'>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                    </div>
                    {{ $employees->links() }}
                </div>
            </div>

        </div>

        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            {{-- @livewire('employee-table') --}}
        </div>

    </section>

    <hr>

</div>

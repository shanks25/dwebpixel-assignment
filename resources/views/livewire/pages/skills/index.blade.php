<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Skills</h1>
        </div>

        @include('messages.messages')
        <div class="grid grid-cols-12 gap-x-5 my-10">
            <div class="col-span-8">
                <div class="flex justify-center">
                    <table class="w-full text-md bg-white shadow-md rounded mb-4">
                        <thead>
                            <tr class="border-b bg-gray-50">
                                <th class="text-left p-3 px-5">Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse  ($skills as $skill)
                                <tr class="border-b">
                                    <td class="p-3 px-5">
                                        <p class="font-medium capitalize">{{ $skill->name }}</p>
                                    </td>
                                    <td class="p-3 px-5 flex justify-end">
                                        <button wire:click="edit({{ $skill->id }})"
                                            class="mr-3 text-sm bg-transparent text-blue-500 py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                            Edit
                                        </button>
                                        <button wire:click="delete({{ $skill->id }})"
                                            class="text-sm  text-red-500 py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        <p class="p-5">No skill found!</p>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-span-4">
                <div class="border shadow rounded-lg p-5">
                    <h1 class="font-semibold text-lg">Add new skill</h1>

                    <form wire:submit.prevent="{{ $editMode ? 'update' : 'store' }}" name="modalForm" method="POST"
                        class="w-full mx-auto">
                        <div class="my-5">
                            <label for="name" class="mb-3 block text-sm font-medium text-[#07074D]">Name </label>
                            <input type="text" id="name" required
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder:text-sm"
                                placeholder="Skill Name" wire:model="name">
                            <div class="text-xs text-red-600 font-semibold pt-1">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <button type="submit" id="submitBtn"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-semibold p-2 rounded">
                                Save
                            </button>
                            @if ($editMode)
                                <button type="button" wire:click="resetForm"
                                    class="bg-gray-500 text-white px-4 py-2 rounded ml-2">
                                    Cancel
                                </button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

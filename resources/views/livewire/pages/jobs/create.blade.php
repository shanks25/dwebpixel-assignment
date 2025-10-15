<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Create new job posting</h1>
        </div>
        @include('messages.messages')
        <form wire:submit.prevent="store" name="modalForm" method="POST" class="w-full mx-auto">
            <div class="grid grid-cols-12 gap-x-5 my-10">
                <div class="col-span-8">
                    <div class="border shadow rounded-lg p-5">
                        <h1 class="font-semibold text-lg">Job details</h1>
                        <div class="my-5">
                            <label for="title" class="mb-3 block text-sm font-medium text-[#07074D]">Title </label>
                            <input type="text" required id="title"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder:text-sm"
                                placeholder="Job posting title" wire:model="title">
                            <div class="text-xs text-red-600 font-semibold pt-1">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="my-4">
                            <label for="description" class="mb-3 block text-sm font-medium text-[#07074D]">Description
                            </label>
                            <textarea type="text" required id="description"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder:text-sm"
                                placeholder="Job posting description" wire:model="description"></textarea>
                            <div class="text-xs text-red-600 font-semibold pt-1">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="flex gap-x-5">
                            <div class="w-1/2">
                                <label for="experience" class="mb-3 block text-sm font-medium text-[#07074D]">Experience
                                </label>
                                <input type="text" required id="experience"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder:text-sm"
                                    placeholder="Eg. 1-3 Yrs" wire:model="experience">
                                <div class="text-xs text-red-600 font-semibold pt-1">
                                    @error('experience')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="w-1/2">
                                <label for="salary" class="mb-3 block text-sm font-medium text-[#07074D]">Salary
                                </label>
                                <input type="text" required id="salary"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder:text-sm"
                                    placeholder="Eg. 2.75-5 Lacs PA" wire:model="salary">
                                <div class="text-xs text-red-600 font-semibold pt-1">
                                    @error('salary')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-x-5 my-5">
                            <div class="w-1/2">
                                <label for="location" class="mb-3 block text-sm font-medium text-[#07074D]">Location
                                </label>
                                <input type="text" required id="location"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder:text-sm"
                                    placeholder="Eg. Remote/ Pune" wire:model="location">
                                <div class="text-xs text-red-600 font-semibold pt-1">
                                    @error('location')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="w-1/2">
                                <label for="extra_info" class="mb-3 block text-sm font-medium text-[#07074D]">Extra Info
                                </label>
                                <input type="text" id="extra_info"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder:text-sm"
                                    placeholder="Eg. Full Time,Urgent / Part Time, Flexible" wire:model="extra_info">
                                <p class="text-xs text-gray-500">Please use comma seperated values</p>
                                <div class="text-xs text-red-600 font-semibold pt-1">
                                    @error('extra_info')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="border shadow rounded-lg px-5 pt-5">
                        <h1 class="font-semibold text-lg">Company details</h1>
                        <div class="my-5">
                            <label for="company_name" class="mb-3 block text-sm font-medium text-[#07074D]">Name
                            </label>
                            <input type="text" required id="company_name"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder:text-sm"
                                placeholder="Company Name" wire:model="company_name">
                            <div class="text-xs text-red-600 font-semibold pt-1">
                                @error('company_name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mt-5 mb-2">
                            <label for="company_logo" class="mb-3 block text-sm font-medium text-[#07074D]">Logo
                            </label>
                            <input type="file" id="company_logo" placeholder="Company Name"
                                wire:model="company_logo">
                            <div class="text-xs text-red-600 font-semibold pt-1">
                                @error('company_logo')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="border shadow rounded-lg p-5 mt-4">
                        <h1 class="font-semibold text-lg">Skills</h1>
                        <div class="my-5">
                            <label for="skills" class="mb-3 block text-sm font-medium text-[#07074D]">Name </label>
                            <select wire:model="skills" required id="skills"
                                class="block w-full p-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                multiple>
                                <option value="">Select skill</option>
                                @foreach ($getSkills as $skill)
                                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                @endforeach
                            </select>
                            <div class="text-xs text-red-600 font-semibold pt-1">
                                @error('skills')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <button type="submit" id="submitBtn"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-semibold p-2 rounded">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

<x-layout>
    <div class=" ml-64 p-5 py-2 mr-10 mt-5">

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
          
        <div class="flex justify-end mb-3">
            <button type="button" x-data x-on:click="$dispatch('open-modal')" class="px-4 py-2 text-sm text-slate-100 bg-gray-700 hover:bg-gray-900 rounded-md">
                Add Agent
            </button>
        </div>
       

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left  text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Role</th>
                        <th scope="col" class="px-6 py-3">View</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($agents as $agent)
                        <tr class="bg-white border-b border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <a href="{{ route('admin.agents.show', ['agent' => $agent->slug]) }}">{{$agent->name}}</a>
                            </th>
                            <td class="px-6 py-4">{{$agent->email}}</td>
                            <td class="px-6 py-4">Laptop</td>
                            <td class="px-6 py-4">$2999</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class=" text-center">
                                <p>No registered agent yet</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    {{-- registration modal --}}
    <div class="container mx-auto p-2 text-center">
        <div class="mt-6" x-data="{ open: false }" x-show="open" @open-modal.window="open = true" >
      
            <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center" style="background-color: rgba(0,0,0,.5);" x-show="open">
                <div class="text-left bg-white h-auto p-4 md:max-w-xl md:p-6 lg:p-8 shadow-xl rounded mx-2 md:mx-0" @click.away="open = true">
                    <h2 class="text-lg text-center pb-4 font-medium">Register New Agent</h2>
                    <form 
                        method="POST" 
                        action=" {{ route('admin.agents.store') }}"
                        class="max-w-xl w-full mx-auto space-y-4"
                        >
                        @csrf

                        <div class="">
                        <label for="name" class="block mb-1 text-sm font-medium text-gray-900">Name</label>
                        <input type="name" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="ebiye edonyabo"/>
                        </div>
                        @error('name') <span class="text-sm text-red-500 mb-2">{{ $message }}</span> @enderror

                        <div class="">
                        <label for="email" class="block mb-1 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@flowbite.com"/>
                        </div>
                        @error('email') <span class="text-sm text-red-500 mb-2">{{ $message }}</span> @enderror

                        <div class="">
                        <label for="password" class="block mb-1 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@flowbite.com"/>
                        </div>
                        @error('password') <span class="text-sm text-red-500 mb-2">{{ $message }}</span> @enderror

                        <div class="">
                        <label for="password_confirmation" class="block mb-1 text-sm font-medium text-gray-900">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                        </div>
                        @error('password_confirmation') <span class="text-sm text-red-500 mb-2">{{ $message }}</span> @enderror
                        
                        <div class="flex justify-between gap-x-5">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 text-sm px-4 py-2 rounded-md">Submit</button>
                        
                            <button type="button" class="bg-gray-700 hover:bg-gray-900 text-white px-4 py-2 text-sm rounded-md " x-on:click="open = false">Close</button>
                        </div>
                    </form>
                </div>
            </div>
          
        </div>
    </div>
</x-layout>
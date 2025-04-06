<x-layout>
    <div class=" ml-64 p-5 py-2 mr-10 mt-5">

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
          

        <div class="max-w-3xl p-2 space-y-10">
            {{-- account info --}}
            <div>
                <h1 class="text-base font-medium text-gray-800 border-b border-gray-500 w-auto">Account Info</h1>
                <div class="flex justify-between items-center my-2">
                    <p class="text-sm text-gray-600 "><strong>Name: </strong>{{ $agent->name }} </p>
                    <p class="text-sm text-gray-600 "><strong>Email: </strong>{{ $agent->email }} </p>
                </div>
            </div>

            {{-- roles --}}
            <div>
                <div class="flex justify-between items-end border-b border-gray-500 pb-1">
                    <h1 class="text-base font-medium text-gray-800 ">Roles</h1>
                    <button type="button" x-data x-on:click="$dispatch('open-modal')" class="px-3 py-1.5 text-sm text-slate-100 bg-gray-700 hover:bg-gray-900 rounded-sm">
                        Assign Role
                    </button>
                </div>
                @forelse ($agent->getRoleNames() as $role)
                    <div class="flex justify-between items-center my-2">
                        <p class="text-sm text-gray-600 "><strong>Name: </strong>{{ $role }} </p>
                    </div>
                @empty
                    <div class="flex flex-col justify-center items-centermy-2">
                        <p class="text-sm text-gray-600">No Roles Assigned</p>
                    </div>
                @endforelse
            </div>

            {{-- Permissions --}}
            <div>
                <div class="flex justify-between items-end border-b border-gray-500 pb-1">
                    <h1 class="text-base font-medium text-gray-800 ">Permissions</h1>
                    <button type="button" x-data x-on:click="$dispatch('permission-modal')" class="px-3 py-1.5 text-sm text-slate-100 bg-gray-700 hover:bg-gray-900 rounded-sm">
                        Give Permission
                    </button>
                </div>
                @forelse ($agent->permissions as $permission)
                    <div class="flex justify-between items-center my-2">
                        <p class="text-sm text-gray-600 "><strong>Name: </strong>{{ $permission->name }} </p>

                        <form method="POST" action="{{ route('admin.agents.permission.destroy', ['agent' => $agent->slug, 'permission' => $permission->id]) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="text-xs text-slate-100 bg-red-500 hover:bg-red-600 px-2.5 py-1.5 rounded-sm">Revoke</button>
                        </form>
                    </div>
                @empty
                    <div class="flex flex-col justify-center items-centermy-2">
                        <p class="text-sm text-gray-600">No Permissions Given</p>
                    </div>
                @endforelse

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
       
    </div>

    {{-- not used form --}}
    <div class="container mx-auto p-2 text-center">
        <div class="mt-6" x-data="{ open: false }" x-show="open" @open-modal.window="open = true" >
      
            <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center" style="background-color: rgba(0,0,0,.5);" x-show="open">
                <div class="text-left bg-white h-auto p-4 md:max-w-xl md:p-6 lg:p-8 shadow-xl rounded mx-2 md:mx-0" @click.away="open = true">
                    <h2 class="text-lg text-center pb-4 font-medium">Register New Agent</h2>
                    <form 
                        method="POST" 
                        action=""
                        class="max-w-xl w-full mx-auto space-y-4"
                        >
                        @csrf

                        <div class="">
                            <label for="name" class="block mb-1 text-sm font-medium text-gray-900">Name</label>
                            <input type="name" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="ebiye edonyabo"/>
                        </div>
                        @error('name') <span class="text-sm text-red-500 mb-2">{{ $message }}</span> @enderror

                        <div class="flex justify-between gap-x-5">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 text-sm px-4 py-2 rounded-md">Submit</button>
                        
                            <button type="button" class="bg-gray-700 hover:bg-gray-900 text-white px-4 py-2 text-sm rounded-md " x-on:click="open = false">Close</button>
                        </div>
                    </form>
                </div>
            </div>
          
        </div>
    </div>

    {{-- Give permission to user--}}
    <div class="container mx-auto p-2 text-center">
        <div class="mt-6" x-data="{ open: false }" x-show="open" @permission-modal.window="open = true" >
      
            <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center" style="background-color: rgba(0,0,0,.5);" x-show="open">
                <div class="text-left bg-white h-auto p-4 w-80 md:p-6 lg:p-8 shadow-xl rounded mx-2 md:mx-0" @click.away="open = true">
                    <h2 class="text-lg text-center pb-4 font-medium">Assign Permission</h2>
                    <form 
                        method="POST" 
                        action=" {{ route('admin.agents.permission.store', ['agent' => $agent->slug]) }}"
                        class=" w-full mx-auto space-y-4"
                        >
                        @csrf

                        <div class="w-full mx-auto">
                            <label for="permission" class="block mb-2 text-sm font-medium text-gray-900">Select permission</label>
                            <select id="permission" name="permission" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                                <option value="" disabled selected>Choose a permission</option>
                                @foreach (\App\Enums\UserPermissions::cases() as $permission)
                                    <option value="{{ $permission->value }}">{{ $permission->value }}</option>
                                @endforeach>
                            </select>
                        </div>
                        @error('permission') <span class="text-sm text-red-500 mb-2">{{ $message }}</span> @enderror
                        
                        <div class="flex justify-between gap-x-5 mt-5">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 text-sm px-4 py-2 rounded-md">Submit</button>
                        
                            <button type="button" class="bg-gray-700 hover:bg-gray-900 text-white px-4 py-2 text-sm rounded-md " x-on:click="open = false">Close</button>
                        </div>
                    </form>
                </div>
            </div>
          
        </div>
    </div>
</x-layout>
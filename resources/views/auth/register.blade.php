
<x-layout>
    <form 
        method="POST" 
        action="{{ route('register-user') }}"
        class=" max-w-4xl mx-auto space-y-4"
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
        
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Submit</button>
    </form>
</x-layout>

  
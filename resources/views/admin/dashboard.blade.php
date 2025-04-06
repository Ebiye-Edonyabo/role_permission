<x-layout>
    <div class=" ml-64 p-5">
          
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-neutral-200">
                            <thead>
                                <tr class="text-neutral-500">
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Name</th>
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Email</th>
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Permission</th>
                                    <th class="px-5 py-3 text-xs font-medium text-right uppercase">View</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-neutral-200">
                                @foreach ($customers as $customer)
                                <tr class="text-neutral-800">
                                    <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">{{$customer->name}}</td>
                                    <td class="px-5 py-4 text-sm whitespace-nowrap">{{$customer->email }}</td>
                                    <td class="px-5 py-4 text-sm whitespace-nowrap">Pied Piper HQ, Palo Alto</td>
                                    <td class="px-5 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        <a class="text-blue-600 hover:text-blue-700" href="#">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
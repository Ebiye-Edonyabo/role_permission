<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
   
    </head>
    <body class="bg-[#FDFDFC] ">
        
        {{-- side bar --}}
        <x-side-bar />

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
    </body>
</html>

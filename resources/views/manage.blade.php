@extends('layout.app', [
    'userName' => 'Yuma Akhansa',
    'userProfileImage' => 'https://placehold.co/50x50'
])

@section('title')
    Manage User
@endsection

@section('content')
<div class="bg-white rounded-2xl shadow-sm p-8">
    <h2 class="text-2xl font-bold mb-6">User Data</h2>
    <div class="flex justify-end mb-4 gap-2">
        <div class="relative">
            <input type="text" class="rounded-full border border-gray-200 px-4 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-gray-100 pr-10" placeholder="Search">
            <span class="absolute right-3 top-2.5 text-gray-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
            </span>
        </div>
        <button class="rounded-full border border-gray-200 px-4 py-2 flex items-center gap-2 text-gray-600 hover:bg-gray-100">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M8 12h8M12 8v8"/></svg>
            Filters
        </button>
    </div>

    {{-- Place this where you want the toggle --}}
    <div x-data="{ tab: 'user' }" class="flex flex-col mb-6">
        <div class="flex items-center mb-6">
            <button
                :class="tab === 'user' 
                    ? 'bg-black text-yellow-400 font-bold shadow-md' 
                    : 'bg-gray-100 text-gray-700 font-semibold'"
                @click="tab = 'user'"
                class="px-6 py-2 transition rounded-l-full focus:outline-none"
            >User</button>
            <button
                :class="tab === 'company' 
                    ? 'bg-black text-yellow-400 font-bold shadow-md' 
                    : 'bg-gray-100 text-gray-700 font-semibold'"
                @click="tab = 'company'"
                class="px-6 py-2 transition rounded-r-full -ml-px focus:outline-none"
            >Partner Company</button>
        </div>

        {{-- User Table --}}
        <div x-show="tab === 'user'">
            <div class="overflow-x-auto rounded-xl bg-white">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">No</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Name</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Email</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Role</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <x-manageuser.item no="1" name="Alexandra Grace" email="alexandra@gmail.com" role="Student"/>
                        <x-manageuser.item no="2" name="Nathaniel James" email="nath.james@yahoo.com" role="Admin"/>
                        <x-manageuser.item no="3" name="Sophia Marie" email="sophiamar88@gmail.com" role="Student"/>
                        <x-manageuser.item no="4" name="Benjamin Carter" email="benjamincarter@gmail.com" role="Student"/>
                        <x-manageuser.item no="5" name="Daniel Harper" email="danielharper77@gmail.com" role="Student"/>
                        <x-manageuser.item no="6" name="Isabella Rose" email="isarose@gmail.com" role="Student"/>
                        <x-manageuser.item no="7" name="Adam Smith" email="adamsmith@gmail.com" role="Student"/>
                        <x-manageuser.item no="8" name="Michael Thomas" email="michaelthomas10@gmail.com" role="Student"/>
                        <x-manageuser.item no="9" name="William Scott" email="williescott@gmail.com" role="Supervisor"/>
                        <x-manageuser.item no="10" name="Charlotte Avery" email="charlotteavery@gmail.com" role="Supervisor"/>
                        <x-manageuser.item no="11" name="Maria Alexis" email="alexismaria@gmail.com" role="Supervisor"/>
                        <x-manageuser.item no="12" name="Sinthia raxy" email="exaraxysinthia@gmail.com" role="Admin"/>
                        <x-manageuser.item no="13" name="Juno martens" email="junomartens71@gmail.com" role="Admin"/>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Company Table --}}
        <div x-show="tab === 'company'">
            <div class="overflow-x-auto rounded-xl bg-white">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">No</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Company Name</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Email</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Contact Person</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Example rows, replace with your dynamic data or Blade components --}}
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-700">1</td>
                            <td class="px-6 py-4 text-sm text-gray-700">Acme Corp</td>
                            <td class="px-6 py-4 text-sm text-gray-700">contact@acme.com</td>
                            <td class="px-6 py-4 text-sm text-gray-700">Jane Doe</td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                <button class="text-blue-600 hover:underline">View</button>
                                <button class="text-red-600 hover:underline ml-2">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-700">2</td>
                            <td class="px-6 py-4 text-sm text-gray-700">Beta Solutions</td>
                            <td class="px-6 py-4 text-sm text-gray-700">info@betasolutions.com</td>
                            <td class="px-6 py-4 text-sm text-gray-700">John Smith</td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                <button class="text-blue-600 hover:underline">View</button>
                                <button class="text-red-600 hover:underline ml-2">Delete</button>
                            </td>
                        </tr>
                        {{-- Add more rows or use a Blade component for companies --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100">
        <div class="flex items-center gap-2">
            <select class="px-2 py-1 border border-gray-200 rounded-md text-sm">
                <option>10</option>
                <option>25</option>
                <option>50</option>
            </select>
            <span class="text-sm text-gray-600">Entries per page</span>
        </div>
        <div class="flex items-center gap-2">
            <button class="p-2 rounded-lg border border-gray-200">
                <svg class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"/>
                </svg>
            </button>
            <span class="px-3 py-1 text-sm">1</span>
            <button class="p-2 rounded-lg border border-gray-200">
                <svg class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                </svg>
            </button>
        </div>
        <div class="flex items-center gap-2">
            <span class="text-sm text-gray-600">Page</span>
            <select class="px-2 py-1 border border-gray-200 rounded-md text-sm">
                <option>1</option>
            </select>
        </div>
    </div>
</div>
<script src="//unpkg.com/alpinejs" defer></script>
@endsection
@extends('dashboard_layout')

@push('scripts')
    <script type="text/javascript" src="{{ asset('assets/js/product.js') }}" defer></script>
@endpush

@section('content')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log("DOM loaded");
            @if(session()->has('status'))
                console.log("{{ session('status') }}");
                showNotification('{{ session('message') }}', '{{ session('status') }}');
                {{ session()->forget('status') }}
                {{ session()->forget('message') }}
            @endif
        });
    </script>

    <!-- Notification Container -->
    <div id="notification-container" class="relative w-full">
        <!-- Notifications will appear here -->
    </div>

    <!-- Page Header and Add Product Button -->
    <div class="w-full flex justify-between items-center sm:items-start">
        <h2 class="text-3xl font-semibold text-primary">
            All Users
        </h2>
        <a href="{{ route('dashboard.addUsers') }}" class="">
            <button class="btn-primarybtn bg-success-bg px-3 py-2 text-white" > <i class='fas fa-plus'></i> Add User</button>
        </a>
    </div>

    <!-- Products Table -->
    <div class="w-full bg-white p-4 max-h-[75vh] overflow-auto">
        <table class="w-full table-auto">
            <thead class="text-left text-lg font-medium border-b border-border_clr">
                <tr>
                    <th class="text-secondary text-[16px]">Profile Picture</th>
                    <th class="text-secondary text-[16px]">Name</th>
                    <th class="text-secondary text-[16px]">Email</th>
                    <th class="text-secondary text-[16px]">Role</th>
                    <th class="text-secondary text-[16px]">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($users))
                    @foreach ($users as $user)
                        <tr class="border-b-2 border-b-border_clr">
                            <!-- user Image -->
                            <td class="py-2">
                                @if($user->profile_image)
                                    <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Picture" class="h-[70px] w-[70px] object-cover object-center">
                                @else
                                    <div class="h-[70px] w-[70px] bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-image text-gray-400"></i>
                                    </div>
                                @endif
                            </td>

                            <!-- user Name -->
                            <td>
                                <h2 class="font-semibold">{{ $user->name }}</h2>
                            </td>

                            <!-- user email -->
                            <td>
                                <p>{{ $user->email }}</p>
                            </td>

                            <!-- user role -->
                            <td>
                                <p>{{ ucfirst($user->role) }}</p>
                            </td>

                            <!-- Action Buttons -->
                            <td class="text-xl text-secondary">
                                <div class="flex items-center gap-2">
                                    <!-- Edit Button -->
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" class="text-center py-4 text-secondary">
                            No User found.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>

        <!-- Pagination Links -->
    </div>
@endsection
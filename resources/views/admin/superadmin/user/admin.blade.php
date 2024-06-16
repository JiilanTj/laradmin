<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <div class="flex">
            @include('components.sidebar')
            <div class="content" style="margin-left: 250px; padding: 20px; box-sizing: border-box; flex-grow: 1; background-color: #f7fafc;">
                <div class="content-body" style="background-color: #ffffff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="pb-4 bg-white dark:bg-gray-900 flex justify-between items-center">
                            <form method="GET" action="{{ route('users.admin') }}">
                                <label for="table-search" class="sr-only">Search</label>
                                <div class="relative mt-1">
                                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                        </svg>
                                    </div>
                                    <input type="text" name="search" id="table-search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search by ID, Name, Email">
                                </div>
                            </form>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                <i class="fas fa-plus"></i> Add
                            </button>
                        </div>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Role
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admin as $index => $user)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="w-4 p-4">
                                        {{ $index + 1 }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $user->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ $user->role }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
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

    <!-- Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm">
                        <div class="mb-3">
                            <label for="user-role" class="form-label">Role</label>
                            <select class="form-select" id="user-role" required>
                                <option value="admin">Admin</option>
                                <option value="superadmin">Superadmin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="user-name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="user-name" required>
                        </div>
                        <div class="mb-3">
                            <label for="user-email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="user-email" required>
                        </div>
                        <div class="mb-3">
                            <label for="user-password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="user-password" required>
                        </div>
                        <div class="mb-3">
                            <label for="user-password-confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="user-password-confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('addUserForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            const role = document.getElementById('user-role').value;
            const name = document.getElementById('user-name').value;
            const email = document.getElementById('user-email').value;
            const password = document.getElementById('user-password').value;
            const passwordConfirmation = document.getElementById('user-password-confirmation').value;

            console.log({
                name: name,
                email: email,
                password: password,
                password_confirmation: passwordConfirmation
            });

            let apiUrl = '';
            if (role === 'admin') {
                apiUrl = 'http://127.0.0.1:8000/api/registeradmin';
            } else if (role === 'superadmin') {
                apiUrl = 'http://127.0.0.1:8000/api/registersuperadmin';
            }

            fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    name: name,
                    email: email,
                    role: role,
                    password: password,
                    password_confirmation: passwordConfirmation
                })
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => {
                        throw new Error(err.message || 'Something went wrong');
                    });
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                alert('User added successfully!');
                location.reload(); // Reload the page to reflect changes
            })
            .catch(error => {
                console.error('Error:', error.message);
                alert(`Error adding user: ${error.message}`);
            });
        });
    </script>
</body>
</html>

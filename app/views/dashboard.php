<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="w-1/4 bg-black text-white p-4">
            <div class="flex items-center mb-4">
                <img src="./public/Assets/img/OIP.jpg" alt="Admin Photo" class="w-12 h-12 rounded-full mr-4">
                <div>
                    <p class="font-bold text-xl">Admin Users</p>
                </div>
            </div>
            <ul class="list-none py-20">
                <li class="py-4"><a href="dashboard.html"
                        class="font-bold text-3xl hover:bg-white hover:text-gray-400">Dashboard</a>
                </li>
                <li class="py-4"><a href="users.html"
                        class="font-bold text-3xl hover:bg-white hover:text-gray-400">Users</a></li>
                <li class="py-4"><a href="sessions.html"
                        class="font-bold text-3xl hover:bg-white hover:text-gray-400">Sessions</a>
                </li>
                <li class="py-4"><a href="connexion.php"
                        class="font-bold text-3xl hover:bg-white hover:text-gray-400">Déconnexion</a>
                </li>
            </ul>
        </div>
        <!-- Main Content -->
        <div class="w-3/4 p-4">
            <!-- Users Visualization -->
            <div class="bg-white p-4 mb-4 shadow-md rounded">
                <h2 class="text-2xl font-bold mb-4">Utilisateurs présents sur la plateforme</h2>
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2">Nom</th>
                            <th class="py-2">Email</th>
                            <th class="py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example user row -->
                        <tr>
                            <td class="py-2"></td>
                            <td class="py-2"></td>
                            <td class="py-2">
                                <div class="flex justify-center space-x-2 mt-2">
                                    <button class="bg-blue-500 text-white px-2 py-1 rounded">Modifier</button>
                                    <button class="bg-red-500 text-white px-2 py-1 rounded">Supprimer</button>
                                </div>
                            </td>
                        </tr>
                        <!-- Add more user rows as needed -->
                    </tbody>
                </table>
                <button class="bg-green-500 text-white px-4 py-2 mt-4 rounded">Ajouter un utilisateur</button>
            </div>
            <!-- Sessions Visualization -->
            <div class="bg-white p-4 shadow-md rounded">
                <h2 class="text-2xl font-bold mb-4">Sessions</h2>
                <!-- Content for sessions visualization -->
            </div>
        </div>
    </div>
    </tbody>
</body>

</html>
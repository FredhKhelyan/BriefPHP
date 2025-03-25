<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-cover bg-center h-screen" style="background-image: url('./public/Assets/img/background.jpeg');">
    <div class="flex items-center justify-center h-full">
        <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg max-w-md w-full">
            <h1 class="text-4xl font-bold text-center text-green-500 mb-8">Bienvenue sur LifeStream</h1>
            <form action="accueil.php?action=register" method="POST" class="space-y-6">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Username</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="username" name="username" type="text" placeholder="Username" required>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email" name="email" type="email" placeholder="Email" required>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="password" name="password" type="password" placeholder="Password" required>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm-password">Confirm
                        Password</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="confirm-password" name="confirm_password" type="password" placeholder="Confirm Password"
                        required>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="role">Role</label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="role" name="role" required>
                        <option value="admin">Administrateur</option>
                        <option value="user">Utilisateur</option>
                    </select>
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">S'inscrire</button>
                </div>

                <div class=" text-center mt-8">
                    <p class="text-sm text-gray-500">Already have an account? <a href="app\views\Connexion.php"
                            class="text-green-500 hover:text-blue-500">Log In</a></p>
                </div>
        </div>
    </div>
    </form>


</body>

</html>
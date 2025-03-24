<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <div class="flex flex-col justify-center items-center h-screen bg-gray-100">
        <div class="m-auto box-shadow p-8 bg-white rounded-lg shadow-lg max-w-md">
            <h1 class="text-4xl font-bold text-center mb-4 text-green-500">Bon retour parmi nous</h1>
            <form class="w-full max-w-sm" action="accueil.php?action=login" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Username
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="username" type="text" placeholder="Username">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="password" type="password" placeholder="Password">
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-green-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="button"><a href="app\views\dashboard.php">Se
                            connecter</a>

                    </button>
                </div>
            </form>
            <div class="flex flex-col justify-center items-center mt-6">
                <p class="text-sm text-gray-500">You haven't an account? <a href="app\views\Inscription.php"
                        class="text-green-500 hover:text-blue-700">Inscription</a></p>
            </div>
        </div>
    </div>
</body>

</html>
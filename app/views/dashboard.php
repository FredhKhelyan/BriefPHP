<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'gestion_utilisateurs';
$username = 'root'; // Remplacez par votre utilisateur MySQL
$password = ''; // Remplacez par votre mot de passe MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Suppression d'un utilisateur
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$delete_id]);
    header("Location: dashboard.php"); // Recharge la page après suppression
    exit;
}

// Mise à jour d'un utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_user'])) {
    $id = intval($_POST['user_id']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $status = htmlspecialchars($_POST['status']);

    if (!empty($username) && !empty($email) && !empty($status)) {
        $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ?, status = ? WHERE id = ?");
        $stmt->execute([$username, $email, $status, $id]);
        header("Location: dashboard.php"); // Recharge la page après modification
        exit;
    } else {
        $error = "Tous les champs sont obligatoires.";
    }
}

// Ajout d'un nouvel utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_user'])) {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $status = htmlspecialchars($_POST['status']);

    if (!empty($username) && !empty($email) && !empty($status)) {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, status) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $status]);
        header("Location: dashboard.php"); // Recharge la page après ajout
        exit;
    } else {
        $error = "Tous les champs sont obligatoires.";
    }
}

// Récupération des utilisateurs
$query = $pdo->query("SELECT id, username, email, status FROM users");
$users = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script>
    function toggleEditForm(userId, username, email, status) {
        const form = document.getElementById('editUserForm');
        form.style.display = 'block';
        document.getElementById('edit_user_id').value = userId;
        document.getElementById('edit_username').value = username;
        document.getElementById('edit_email').value = email;
        document.getElementById('edit_status').value = status;
    }

    function closeEditForm() {
        const form = document.getElementById('editUserForm');
        form.style.display = 'none';
    }

    function toggleAddForm() {
        const form = document.getElementById('addUserForm');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
    </script>
</head>

<body>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="w-1/5 bg-black text-white p-4 h-screen">
            <div class="flex items-center mb-4">
                <img src="../public/Assets/img/OIP.jpg" alt="Admin Photo" class="w-12 h-12 rounded-full mr-4">
                <div>
                    <p class="font-bold text-xl">Bienvenue</p>
                </div>
            </div>
            <ul class="list-none py-20">
                <li class="py-4"><a href="dashboard.php"
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
                <h2 class="text-4xl font-bold mb-4 mx-15 underline">Utilisateurs présents sur la plateforme</h2>
                <table class="min-w-full bg-white mt-17">
                    <thead>
                        <tr>
                            <th class="py-2 text-left">Username</th>
                            <th class="py-2 text-left">Email</th>
                            <th class="py-2 text-left">Status</th>
                            <th class="py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td class="py-2"><?php echo htmlspecialchars($user['username']); ?></td>
                            <td class="py-2"><?php echo htmlspecialchars($user['email']); ?></td>
                            <td class="py-2"><?php echo htmlspecialchars($user['status']); ?></td>
                            <td class="py-2">
                                <div class="flex justify-center space-x-2 mt-2">
                                    <!-- Modifier -->
                                    <button
                                        onclick="toggleEditForm('<?php echo $user['id']; ?>', '<?php echo htmlspecialchars($user['username']); ?>', '<?php echo htmlspecialchars($user['email']); ?>', '<?php echo htmlspecialchars($user['status']); ?>')"
                                        class="bg-blue-500 text-white px-2 py-1 rounded">Modifier</button>
                                    <!-- Supprimer -->
                                    <a href="dashboard.php?delete_id=<?php echo $user['id']; ?>"
                                        class="bg-red-500 text-white px-2 py-1 rounded"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button onclick="toggleAddForm()" class="bg-green-500 text-white px-4 py-2 mt-4 rounded">Ajouter un
                    utilisateur</button>
            </div>

            <!-- Add User Form -->
            <div id="addUserForm" class="bg-white p-4 shadow-md rounded" style="display: none;">
                <h2 class="text-2xl font-bold mb-4">Ajouter un utilisateur</h2>
                <?php if (isset($error)): ?>
                <p class="text-red-500"><?php echo $error; ?></p>
                <?php endif; ?>
                <form method="POST" action="">
                    <div class="mb-4">
                        <label for="username" class="block text-gray-700">Nom d'utilisateur</label>
                        <input type="text" id="username" name="username" class="w-full p-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="w-full p-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="status" class="block text-gray-700">Statut</label>
                        <input type="text" id="status" name="status" class="w-full p-2 border rounded" required>
                    </div>
                    <button type="submit" name="add_user"
                        class="bg-green-500 text-white px-4 py-2 rounded">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
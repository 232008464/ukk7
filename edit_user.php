<?php
include('koneksi.php');

$id = $_GET['id'];
$user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE user_id=$id"));

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    mysqli_query($koneksi, "UPDATE user SET username='$username', password='$password', role='$role' WHERE user_id=$id");
    header('Location: superadmin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffeef8; /* Latar belakang pink muda */
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #d5006d; /* Warna teks judul pink gelap */
            margin-bottom: 15px;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-width: 400px;
            margin: auto;
        }

        input[type="text"], select {
            width: 100%;
            padding: 12px 15px;
            margin: 8px 0 16px 0;
            border: 1px solid #ff80ab; /* Border pink */
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus, select:focus {
            border-color: #d5006d; /* Border pink gelap saat fokus */
            outline: none;
        }

        input[type="submit"] {
            background-color: #d5006d; /* Tombol pink gelap */
            color: white;
            padding: 12px 0;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #c51162; /* Warna tombol saat hover */
        }

        /* Responsive */
        @media (max-width: 500px) {
            form {
                padding: 15px;
                max-width: 100%;
            }

            input[type="text"], select {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <h2>Edit User</h2>
    <form method="post">
        <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
        <input type="text" name="password" value="<?= htmlspecialchars($user['password']) ?>" required>

        <select name="role">
            <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>user</option>
            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>admin</option>
            <option value="superadmin" <?= $user['role'] == 'superadmin' ? 'selected' : '' ?>>superadmin</option>
        </select>
        <input type="submit" name="update" value="UPDATE">
    </form>
</body>
</html>

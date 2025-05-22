<?php
session_start();
include('koneksi.php');


if (isset($_POST['tambah'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    mysqli_query($koneksi, "INSERT INTO user (username, password, role) VALUES ('$username', '$password', '$role')");
}


$data_user = mysqli_query($koneksi, "SELECT * FROM user");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manajemen User</title>
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
            box-shadow: 0 4px 8px rgba(233, 77, 113, 0.2);
            max-width: 400px;
            margin-bottom: 30px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(233, 77, 113, 0.2);
        }

        th, td {
            padding: 14px 20px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 15px;
        }

        th {
            background-color: #f9c2d6; /* Warna header tabel */
            font-weight: 600;
            color: #555;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        a {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 500px) {
            form {
                padding: 15px;
                max-width: 100%;
            }

            th, td {
                padding: 10px 12px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <h2>Tambah User</h2>
    <form action="superadmin.php" method="post">
        <input type="text" name="username" placeholder="username" required>
        <input type="text" name="password" placeholder="password" required>
        <select name="role">
            <option value="user">user</option>
            <option value="admin">admin</option>
            <option value="superadmin">superadmin</option>
        </select>
        <input type="submit" name="tambah" value="TAMBAH">
    </form>

    <h2>Data User</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $no = 1;
        while ($row = mysqli_fetch_assoc($data_user)) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['username']) ?></td>
            <td><?= htmlspecialchars($row['password']) ?></td>
            <td><?= htmlspecialchars($row['role']) ?></td>
            <td>
                <a href="edit_user.php?id=<?= $row['user_id'] ?>">Edit</a> | 
                <a href="hapus_user.php?id=<?= $row['user_id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="login.php">keluar</a>
</body>
</html>



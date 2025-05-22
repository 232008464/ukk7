<?php
include('koneksi.php');

$id = $_GET['id'];
$user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE user_id=$id"));

if (isset($_POST['delete'])) {
    mysqli_query($koneksi, "DELETE FROM user WHERE user_id=$id");
    header('Location: superadmin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Hapus User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fcefee; /* soft pink background */
            margin: 0;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .confirmation-box {
            background: #fff0f6; /* very soft pink */
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(166, 77, 121, 0.3);
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: #a64d79; /* dark pink */
            margin-bottom: 20px;
        }

        p {
            color: #7a2e51;
            font-size: 18px;
            margin-bottom: 30px;
        }

        button, a {
            font-size: 16px;
            font-weight: bold;
            padding: 12px 25px;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin: 0 10px;
            transition: background-color 0.3s ease;
        }

        button {
            background-color: #f8bbd0; /* soft pink */
            border: none;
            color: #7a2e51;
        }

        button:hover {
            background-color: #f48fb1;
        }

        a {
            background-color: #fce4ec; /* very light pink */
            color: #a64d79;
            border: 1px solid #f8bbd0;
        }

        a:hover {
            background-color: #f8bbd0;
            color: #7a2e51;
            border-color: #f48fb1;
        }
    </style>
</head>
<body>
    <div class="confirmation-box">
        <h2>Konfirmasi Penghapusan</h2>
        <p>Apakah Anda yakin ingin menghapus user <strong><?= htmlspecialchars($user['username']); ?></strong>?</p>
        <form method="post" style="display:inline;">
            <button type="submit" name="delete">Hapus</button>
        </form>
        <a href="superadmin.php">Batal</a>
    </div>
</body>
</html>

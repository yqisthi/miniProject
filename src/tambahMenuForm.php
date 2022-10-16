<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Burjo Praktiz</title>

    <style>
        .navbar {
            background-color: #16003B;
        }
    </style>
</head>

<body class="py-20 px-36 bg-slate-100">
    <form action="tambahMenu.php" method="get">
        <div class="form-group">
            <label for="nama-menu">Isi Nama Menu:</label>
            <input type="text" class="form-control" id="nama-menu" name="nama" aria-describedby="emailHelp" placeholder="Nama Menu">
        </div>
        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" class="form-control" id="harga" name="harga" placeholder="Rp">
        </div>
        <div class="form-group">
            <label for="link">Link Image:</label>
            <input type="text" class="form-control" id="link" name ="link" placeholder="https://">
        </div>
        <br>
        <button class="btn btn-primary active" type="submit">Submit</button>
        <a class="btn btn-secondary active" type="button" href="adminRumah.php">Cancel</a>
    </form>
</body>

</html>

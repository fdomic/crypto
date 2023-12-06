<!-- resources/views/editCrypto.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Crypto</title>
</head>
<body>

<h1>Edit Crypto</h1>

<form action="{{ route('updateCrypto', ['id' => $id]) }}" method="post">
    @csrf
    @method('put')

    <label for="price">Price:</label>
    <input type="text" name="price" value="{{ $price }}" required>

    <button type="submit">Update</button>
</form>

</body>
</html>

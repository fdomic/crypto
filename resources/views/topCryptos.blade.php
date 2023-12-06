<!-- resources/views/topCryptos.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top 10 Cryptos</title>
</head>
<body>

<h1>Top Cryptos</h1>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Percent Change (15m)</th>
            <th>Edited</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($topCryptos as $crypto)
            <tr>
                <td>{{ $crypto->id }}</td>
                <td>{{ $crypto->name }}</td>
                <td>{{ $crypto->price }}</td>
                <td>{{ $crypto->percent_change_15m }}</td>
                <td>{{ $crypto->edited }}</td>
                <td>
                    <a href="{{ route('editCrypto', ['id' => $crypto->id]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>

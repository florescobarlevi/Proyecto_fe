<!DOCTYPE html>
<html>
<head>
<title>MundosE.com</title>
</head>
<body>
<h1>{{ $details['title'] }}</h1>
<p>Listado de provincias registradas</p>
<table>
  <tr>
    <th>Provincia</th>
  </tr>
  @foreach ($details['body'] as $provincia)
  <tr>
    <td>{{ $provincia->$nombre}} </td>
  </tr>
  @endforeach

</table>
</body>
</html>
<!DOCTYPE html>
<html>
  <style type="text/css">
    table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
    }
    th, td {
  background-color: #96D4D4;
  border-color: ##DF6666;
    }
</style> 
<head>
<title>MundosE.com</title>
</head>
<body>
<h1>{{ $details['title'] }}</h1>
<p>Listado de provincias registradas</p>
<table>
  <tr>
    <th>Provincia</th>
    <th>Codigo Indec</th>
  </tr>
  @foreach ($details['body'] as $provincia)
  <tr>
    <td>{{ $provincia->$nombre}} </td>
    <td>{{ $provincia->$indec_id}} </td>
  </tr>
  @endforeach

</table>
</body>
</html>
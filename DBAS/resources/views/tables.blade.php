<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Tabelas - {{ $database }}</title>

  <!-- Fonts -->
  <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Nunito', sans-serif;
    }
    table, td, th {
      border: 1px solid black;
    }
    table {
      margin: 20px;
    }
    th {
      font-size: 20px;
      font-weight: bold;
    }
    td {
      padding: 5px;
    }
    p {
      font-size: 18px;
    }
  </style>
</head>
<body class="antialiased">
  <h1>
    Trabalhando na database "{{ $database }}"
  </h1>
  <p>
    Total de tabelas: {{ count($tables) }}
  </p>
  <ul>
      @if ($tipo === '')
        <li>
          Quantidade sem linhas: <a href="{{ URL::current() }}/dbas_vazias">{{ $qtd_empty }}</a> 
          ({{ number_format((float)(intval($qtd_empty) * 100 / count($tables)), 2, '.', '') }}%)
        </li>
        <li>
          Quantidade sem descrição: <a href="{{ URL::current() }}/dbas_semdescricao">{{ $qtd_desc }}</a> 
          ({{ number_format((float)(intval($qtd_desc) * 100 / count($tables)), 2, '.', '') }}%)
        </li>
      @else
        <li><a href="{{ url('/') }}/api/v1/database/{{ $database }}">Voltar</a></li>
      @endif
    </ul>
  @if (count($tables) > 0)
    <table>
      <thead>
        <tr>
          <th>Tabela</th>
          <th>Linhas</th>
          <th>Descrição</th>
        </tr>    
      </thead>
      <tbody>
        @foreach ($tables as $table)
          <tr>
            <td>{{$table->TABLE_NAME}} <a href="{{ url('/') }}/api/v1/table/{{ $database }}/{{ $table->TABLE_NAME }}">Link</a></li>
            <td>{{$table->TABLE_ROWS}}</td>
            <td>{{$table->TABLE_COMMENT}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif
  @if (isset($erro))
    <h3>{{ $erro }}</h3>
  @endif
</body>

</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Colunas - {{ $table }}</title>

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
    Trabalhando na tabela "{{ $table }}"
  </h1>
  <p>
    Total de colunas: {{ count($columns) }}
  </p>
  <ul>
    <li><a href="{{ url('/') }}/api/v1/database/{{ $database }}">Voltar para lista de tabelas</a></li>
    @if ($tipo === '')
      <li>Quantidade sem descrição: <a href="{{ URL::current() }}/dbas_semdescricao">{{ $qtd_desc }}</a></li>
    @else
      <li><a href="{{ url('/') }}/api/v1/table/{{ $database }}/{{ $table }}">Voltar</a></li>
    @endif
    </ul>
  @if (count($columns) > 0)
    <table>
      <thead>
        <tr>
          <th>Coluna</th>
          <th>Tipo</th>
          <th>Comentário</th>
          <th>Valor<br>Padrão</th>
        </tr>    
      </thead>
      <tbody>
        @foreach ($columns as $column)
          <tr>
            <td>{{$column->COLUMN_NAME}}</li>
            <td>{{$column->COLUMN_TYPE}}</td>
            <td>{{$column->COLUMN_COMMENT}}</td>
            <td>{{$column->COLUMN_DEFAULT}}</td>
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
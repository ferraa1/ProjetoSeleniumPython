<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>SELENIUM</title>
    <script>
    </script>
</head>

<body>
    <div class="container text-center my-5 p-5 rounded shadow-lg">
        <h1>SELENIUM</h1>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NOME</th>
                    <th scope="col">VALOR (R$)</th>
                    <th scope="col">VARIAÇÃO (%)</th>
                    <th scope="col">MIN (R$)</th>
                    <th scope="col">MAX (R$)</th>
                    <th scope="col">DATA</th>
                    <th scope="col">DELETAR</th>
                </tr>
            </thead>
            </tbody>
            @foreach ($dados as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->nome }}</td>
                <td>{{ $item->valor }}</td>
                <td>{{ $item->variacao }}</td>
                <td>{{ $item->min }}</td>
                <td>{{ $item->max }}</td>
                <td>{{ $item->data }}</td>
                <td>
                    <form id="form_delete" name="form_delete" action="{{ route('item.destroy',$item->id) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este registro?')">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-secondary" type="submit">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
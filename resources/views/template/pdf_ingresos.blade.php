<html>

<head>
    <meta charset="utf-8">
</head>

<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        font-weight: bold;
        border-bottom: 2px solid black;
    }

    td {
        border-bottom: 2px solid black;
    }

    table {
        border-collapse: collapse;
        border-top: 2px solid black;
        border-bottom: 2px solid black;
    }

    .total {
        float: right;
        margin-right: 20px;
        font-weight: bold;
    }

    .radiocir {
        border: 2px solid black;
        border-radius: 5px;
        margin-bottom: 20px;
        padding: 5px;
    }

    .topcontainer {
        width: 100%;
        margin-left: 500px;
    }
</style>

<div class="invoice-box">

    <div class="radiocir">
        <div>
            {{-- <img src="{{ asset('storage/app/' . $logo->path) }}" style="width:175px;height:100px;margin-left: 250px"> --}}
        </div>
        <div style="margin-top: 15px">

            <span style="margin-left: 50px">
                Numero identificatorio: {{ $ingreso->id }}
            </span>

            <span style="margin-left: 175px">
                Fecha: {{ $ingreso->fecha }}
            </span>

        </div>
    </div>
    <div class="radiocir">
        <div style="font-size:18px">

            <span class="p-2">
                Ubicacion: {{ $ingreso->nombre_ubicacion }}

            </span>

        </div>
        <div style="font-size:18px">

            <span class="p-2">
                Responsable: {{ $ingreso->nombreApellido }}
            </span>

        </div>

    </div>
    <div>
        <table cellpadding="0" cellspacing="0">



            <tr class="heading">
                <td>
                    Codigo de Producto
                </td>
                <td>
                    Descripcion
                </td>
                <td style="text-align: center">
                    Cantidad
                </td>
            </tr>

            @foreach ($items as $item)
                <tr class="item">
                    <td>
                        {{ $item->id }}
                    </td>
                    <td>
                        {{ $item->descripcion }}
                    </td>
                    <td style="text-align: center">
                        {{ $item->cantidad }}
                    </td>
                </tr>
            @endforeach




        </table>

    </div>
</div>

</html>

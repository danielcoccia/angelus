<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Código barras</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <style>
    .row{
        /*margin: 1px;
        line-height: 1.0;*/
        font-size: 10px;
        color: #000000;
    }
    </style>
</head>
    <body >
       <a href="/gerenciar-cadastro-inicial">
            <input class="btn btn-danger" type="button" value="Cancelar">
        </a>
    </div>
        <div class="Col" style="font-size: 14px; color:#000; text-align: center;">

          @foreach($result as $results)
                <strong>
                    {!! DNS1D::getBarcodeSVG($results->id, 'C128', 2, 40)!!}</br>
                    {{$results->nome}}</br>
                    {{number_format($results->valor_venda,2,',','.')}}</br>
                </strong>

             @endforeach
        </div>
    </body>
</html>

{{--
 <div class="container text-center" style="margin-top: 50px;">
    <h3 class="mb-5">Barcode Laravel</h3>
    <div>{!! DNS1D::getBarcodeHTML('2021050001', 'C39') !!}</div></br>
    <div>{!! DNS1D::getBarcodeHTML('4445645656', 'POSTNET') !!}</div></br>
    <div>{!! DNS1D::getBarcodeHTML('4445645656', 'PHARMA') !!}</div></br>
    <div>{!! DNS2D::getBarcodeHTML('4445645656', 'QRCODE') !!}</div></br>

<table>
    <div class="row">
       @foreach($itens as $p)
        <div class="col-md-3"><strong>
            {{"Os produtos do bazar são usados,"}}
            </br>
            {{"experimente-os. Não fazemos troca."}}
            </br>
            {!! DNS1D::getBarcodeSVG($p->id, 'EAN13', 2, 40)!!}
            </br>
            {{$p->nome}}</br>
            {{$p->valor_venda}}
        </strong>
        </div>
        @endforeach
    </div>
</table>
--}}

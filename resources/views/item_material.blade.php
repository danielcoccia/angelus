<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Angelus</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <style>
    .row{
        margin: 1px;
        line-height: 1.0;
        font-size: 5px;
        color: #000000;

    }
    </style>
</head>
    <body>
        <table border="3" style="padding: 5px;">
            <div>
                <tbody>  
                    @foreach($itens as $p)
                        <div>
                            <tr>
                                <td style="font-size: 10px;">                    
                                <strong>
                                    {{"Os produtos do bazar são usados,"}}</br>
                                    {{"experimente-os. Não fazemos troca."}}</br>    
                                    {!! DNS1D::getBarcodeSVG($p->id, 'EAN13', 2, 40)!!}</br>
                                    {{$p->nome}}</br>
                                    {{$p->valor_venda}}</br>                            
                                </strong>                    
                                </td>
                            </tr>
                        </div>
                    @endforeach
                </tbody>
            </div>    
        </table>
    </body>
</html>

<!-- <div class="container text-center" style="margin-top: 50px;">
    <h3 class="mb-5">Barcode Laravel</h3>
    <div>{!! DNS1D::getBarcodeHTML('2021050001', 'C39') !!}</div></br>
    <div>{!! DNS1D::getBarcodeHTML('4445645656', 'POSTNET') !!}</div></br>
    <div>{!! DNS1D::getBarcodeHTML('4445645656', 'PHARMA') !!}</div></br>
    <div>{!! DNS2D::getBarcodeHTML('4445645656', 'QRCODE') !!}</div></br>


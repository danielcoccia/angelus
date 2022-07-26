@extends('layouts.master')

@section('title') Blank Page @endsection

@section('content')

                    <div class="row">

            @component('common-components.breadcrumb')
                     @slot('title') Blank page @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') Pages  @endslot
                     @slot('li3') Blank page @endslot
                @endcomponent

                @component('common-components.chart')
                     @slot('chart1_id') header-chart-1  @endslot                     
                     @slot('chart1_title') Balance $ 2,317  @endslot
                     @slot('chart2_id') header-chart-2  @endslot                     
                     @slot('chart3_title') Item Sold 1230  @endslot
                @endcomponent
                    
                      
                    </div>
@endsection

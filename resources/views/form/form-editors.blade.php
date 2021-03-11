@extends('layouts.master')

@section('title') Form Editors @endsection

@section('content')
  <!-- start page title -->
                    <div class="row">

                          @component('common-components.breadcrumb')
                     @slot('title') Form Editors  @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') Forms  @endslot
                     @slot('li3') Form Editors @endslot
                @endcomponent

                @component('common-components.chart')
                     @slot('chart1_id') header-chart-1  @endslot                     
                     @slot('chart1_title') Balance $ 2,317  @endslot
                     @slot('chart2_id') header-chart-2  @endslot                     
                     @slot('chart3_title') Item Sold 1230  @endslot
                @endcomponent

                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Tinymce wysihtml5</h4>
                                    <p class="card-title-desc">Bootstrap-wysihtml5 is a javascript plugin that makes it easy to create simple, beautiful wysiwyg editors with the help of wysihtml5 and Twitter Bootstrap.</p>

                                    <form method="post">
                                        <textarea id="elm1" name="area"></textarea>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

@endsection

@section('footerScript')
 <!--tinymce js-->
            <script src="{{ URL::asset('/libs/tinymce/tinymce.min.js')}}"></script>

            <!-- init js -->
            <script src="{{ URL::asset('/js/pages/form-editor.init.js')}}"></script>

@endsection
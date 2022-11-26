@if ( session('message') )
    @component( 'components/alert' )
        @slot( 'class', 'success' )
        @slot( 'name', 'Êxito' )
        @slot( 'message', session('message') )
    @endcomponent
@endif
@if (session('info'))
    @component( 'components/alert' )
        @slot( 'class', 'info' )
        @slot( 'name', 'Informação' )
        @slot( 'message', session('info') )
    @endcomponent
@endif
@if (session('warning'))
    @component( 'components/alert' )
        @slot( 'class', 'warning' )
        @slot( 'name', 'Advertência' )
        @slot( 'message', session('warning') )
    @endcomponent
@endif
@if (session('danger'))
    @component( 'components/alert' )
        @slot( 'class', 'danger' )
        @slot( 'name', 'Advertência' )
        @slot( 'message', session('danger') )
    @endcomponent
@endif
@if ( $errors->any() )
    @foreach ( $errors->all() as $error )
        @component( 'components/alert' )
            @slot( 'class', 'danger' )
            @slot( 'name', 'Atenção' )
            @slot( 'message', $error )
        @endcomponent
    @endforeach
@endif

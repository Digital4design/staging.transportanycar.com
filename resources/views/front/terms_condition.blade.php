@extends('layouts.web.app')

@section('head_css')
@endsection

@section('content')
    @include('layouts.web.head-web-menu')
    <main>
        <section class="other_info_main">
            <div class="container">
                <h4 class="text-center d-block">{{$data->title}}</h4>
                <div class="other_info_blog terms_condition_blog">
                    {!! $data->content !!}
                </div>
            </div>
        </section>
    </main>
    @include('layouts.web.footer')
@endsection

@section('script')
@endsection

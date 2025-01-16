@extends('layouts.web.app')

@section('head_css')
@endsection

@section('content')
    @include('layouts.web.head-web-menu-without-mobile')
    <main>
        <section class="wd-faq-blog">
            <div class="container">
                <div class="wd_title">
                    <h3>Frequently asked questions</h3>
                    <p>check out our FAQs for more information</p>
                </div>
                <div class="wd_faq">
                    <div class="accordion" id="accordionExample">
                        @foreach($data as $key => $item)
                            <div class="card">
                                <div class="card-header collapsed" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="false">
                                    <span class="title">{{$item->title}}</span>
                                    <span class="accicon rotate-icon">
                                        <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.8335 16.9657V9.96575H0.833496V7.63242H7.8335V0.632416H10.1668V7.63242H17.1668V9.96575H10.1668V16.9657H7.8335Z" fill="#111111"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div id="collapse{{$key}}" class="collapse" data-parent="#accordionExample" style="">
                                    <div class="card-body">
                                        <p>{!! $item->content !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('layouts.web.footer')
@endsection

@section('script')
@endsection

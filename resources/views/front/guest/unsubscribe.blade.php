@extends('layouts.web.app')

@section('head_css')
<style>
.join_network_main .banner_newtext {
    font-size: 40px !important;
}
.other_forgot_account .signnetwork p {
    margin: auto !important ;
    text-align: center;
}
form.other_forgot_account {
    margin-top: 15px;
}
</style>


@endsection

@section('content')
    @include('layouts.web.head-web-menu-without-mobile')
    <main>
        <section class="join_network_main trans_forgotpass position-relative">
            <div class="container">
                <div class="position-relative text-center">
                    <span class="banner_newtext d-block text-center">Unsubscribed</span>
                    <!-- <p>Are you sure you want to unsubscribe?</p> -->
                </div>
                <form class="other_forgot_account">
                    <!-- <a href="{{route('front.home')}}" class="backtologin">
                        <svg width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 11.5L1 6.5L6 1.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>Back </a> -->
                    <div class="signnetwork">
                    <p>
                        The email address {{Auth::guard('web')->user()->email}} has be unsubscribed. you will received no further email from Transport any car.
                    </p>
                    </div>
                </form>
            </div>
            <img src="{{asset('assets/web/images/home/trans_account_img.png')}}" alt="image" class="bgright_img" />
        </section>
    </main>
@endsection

@section('script')
@endsection

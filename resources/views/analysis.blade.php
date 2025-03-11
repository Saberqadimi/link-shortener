@extends('link-shortener::shortener')
@section('title', 'آمار بازدید')
@section('extra-css')
<link rel="stylesheet" href="{{ asset('vendor/link-shortener/css/link-shortener-analysis.css') }}?v=2">
@endsection
@section('content')


<div class="container" style="margin-top: 6%;">
    <h1>آنالیز لینک کوتاه</h1>
    <div class="analysis">
        <p><i class="fas fa-link"></i> <strong>آدرس لینک اصلی:</strong> {{ $analysis['original_url'] }}</p>
        <p><i class="fas fa-compress"></i> <strong>لینک کوتاه:</strong> {{ $analysis['short_url'] }}</p>
        <p><i class="fas fa-mouse-pointer"></i> <strong>تعداد کلیک‌ها:</strong> {{ $analysis['click_count'] }}</p>
        <p><i class="fas fa-calendar-alt"></i> <strong>تاریخ ایجاد:</strong> {{ $analysis['created_at'] }}</p>
    </div>
</div>

@endsection

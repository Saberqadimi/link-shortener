@extends('link-shortener::shortener')
@section('title', 'کوتاه‌کننده لینک')
@section('content')

    <main style="direction: rtl; font-family: Tahoma, sans-serif; padding: 20px;">
        <h1 style="text-align: center; font-size: 2em;">لینک‌های کوتاه بساز!</h1>
        <p style="text-align: center; font-size: 1.1em; color: #cecbcb; line-height: 1.6;">با استفاده از این ابزار،
            می‌تونی لینک‌های طولانی رو به راحتی کوتاه کنی و اون‌ها رو سریع‌تر و راحت‌تر به اشتراک بذاری
            و آمار بازدیدشون رو ببینی.</p>

        <div class="form-container" style="display: flex; justify-content: center; margin-top: 20px;">
            <div class="input-container" style="display: flex; flex-direction: row; gap: 10px; align-items: center;">
                <input id="inputURL" type="url" placeholder="لینک رو وارد کن."
                    style="padding: 10px; width: 300px; font-size: 1em; border: 1px solid #ccc; border-radius: 5px;">
                <button onclick="getURL()"
                    style="padding: 10px 20px; font-size: 1em; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">ثبت
                    لینک</button>
            </div>
        </div>
    </main>


    <div class="result-container">
        @if (!empty($links))
            @foreach ($links as $link)
                <div class="result"
                    style="direction: rtl; display: flex; align-items: center; gap: 10px; background: #f9f9f9; padding: 10px; border: 1px solid #ddd; border-radius: 8px; position: relative;"
                    id="link-{{ $link->id }}">
                    لینک:
                    <span class="tooltip-container" style="position: relative; cursor: pointer;">
                        <span style="color: blue; text-decoration: underline;">نمایش لینک</span>
                        <span class="tooltip"
                            style="visibility: hidden; position: absolute; bottom: 100%; right: 0; background: #333; color: #fff; padding: 5px; border-radius: 5px; white-space: nowrap;">
                            {{ $link->original_url }}
                        </span>
                    </span>
                    <button class="copy-btn"
                        onclick="copyToClipboard('{{ route('link.redirect', $link->short_url) }}')">کپی</button>
                    <a href="{{ route('link.analyze', $link->short_url) }}" target="_blank">
                        <button class="copy-btn">آمار بازدید</button>
                    </a>
                    <button class="copy-btn"
                        onclick="deleteLink(event, '{{ route('link.delete', $link->short_url) }}', '{{ $link->id }}')">
                        <i class="fas fa-trash" style="color: red;"></i>
                    </button>
                </div>
            @endforeach

            <div class="pagination-container">
                {{ $links->links() }}
            </div>
        @endif
    </div>

@endsection

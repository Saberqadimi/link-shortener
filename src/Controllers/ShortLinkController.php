<?php

namespace Laravel\LinkShortener\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\LinkShortener\Models\ShortLink;
use Laravel\LinkShortener\Services\LinkShortenerService;

class ShortLinkController extends Controller
{
    protected $linkShortenerService;

    public function __construct(LinkShortenerService $linkShortenerService)
    {
        $this->linkShortenerService = $linkShortenerService;
    }

    public function createForm()
    {
        $authId = Auth::id();
        $links = ShortLink::where('user_id', $authId)->paginate(12);
        
        return view('link-shortener::create', compact('links'));
    }

    public function create(Request $request)
    {
        try {
            $validated = $this->validateUrl($request);
            $link = $this->linkShortenerService->createShortLink($validated['original_url']);

            return $this->successResponse($link);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->validationErrorResponse($e);
        } catch (\Exception $e) {
            return $this->serverErrorResponse();
        }
    }

    private function validateUrl(Request $request): array
    {
        return $request->validate([
            'original_url' => 'required|url|unique:short_links,original_url'
        ], [
            'required' => 'لطفاً یک لینک وارد کنید.',
            'url' => 'لینک وارد شده معتبر نیست.',
            'unique' => 'این لینک قبلاً ثبت شده است.'
        ]);
    }

    private function successResponse(ShortLink $link): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'short_url' => $link->short_url,
            'original_url' => $link->original_url,
            'id' => $link->id
        ], 201);
    }

    private function validationErrorResponse(\Illuminate\Validation\ValidationException $e): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'error' => 'خطا در اعتبارسنجی!',
            'errors' => $e->errors()
        ], 422);
    }

    private function serverErrorResponse(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'error' => 'خطایی در پردازش درخواست رخ داد. لطفاً دوباره تلاش کنید.'
        ], 500);
    }
    

    public function analyze($shortUrl)
    {
        $link = ShortLink::where('short_url', $shortUrl)->firstOrFail();
        $analysis = $link->analyzeLink();

        return view('link-shortener::analysis', compact('analysis'));
    }

    public function redirectToOriginal($shortUrl)
    {
        $this->linkShortenerService->incrementClickCount($shortUrl);
        $link = ShortLink::where('short_url', $shortUrl)->firstOrFail();

        return redirect($link->original_url);
    }

    public function delete($shortUrl)
    {
        $deleted = $this->linkShortenerService->deleteShortLink($shortUrl);
    
        if ($deleted) {
            return response()->json(['message' => 'لینک با موفقیت حذف شد!'], 200);
        } else {
            return response()->json(['message' => 'مشکلی در حذف لینک پیش آمد!'], 400);
        }
    }
    
}
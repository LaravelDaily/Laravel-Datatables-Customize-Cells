<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Badge;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBadgeRequest;
use App\Http\Requests\UpdateBadgeRequest;
use App\Http\Resources\Admin\BadgeResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BadgesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('badge_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BadgeResource(Badge::all());
    }

    public function store(StoreBadgeRequest $request)
    {
        $badge = Badge::create($request->all());

        return (new BadgeResource($badge))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Badge $badge)
    {
        abort_if(Gate::denies('badge_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BadgeResource($badge);
    }

    public function update(UpdateBadgeRequest $request, Badge $badge)
    {
        $badge->update($request->all());

        return (new BadgeResource($badge))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Badge $badge)
    {
        abort_if(Gate::denies('badge_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $badge->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

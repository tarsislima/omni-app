<?php

namespace App\Http\Controllers;

use App\ChannelUserMessage;
use App\Services\ChannelsService;
use Illuminate\Http\Request;

class ChannelUserMessageController extends Controller
{
    public $channelsService;

    public function __construct(ChannelsService $channelsService)
    {
        $this->channelsService = $channelsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = $this->channelsService->allUserChannel($request->get('channel'));
        return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ChannelUserMessage $channelUserMessage
     * @return \Illuminate\Http\Response
     */
    public function show(ChannelUserMessage $channelUserMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ChannelUserMessage $channelUserMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChannelUserMessage $channelUserMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ChannelUserMessage $channelUserMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChannelUserMessage $channelUserMessage)
    {
        //
    }
}

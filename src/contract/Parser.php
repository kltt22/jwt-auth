<?php


namespace Yuan\JwtAuth\contract;

use think\Request;

interface Parser
{
    public function parse(Request $request);
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

trait ApiContribution
{
    public function contribute(Request $request)
    {
        $request->validate([
            'content' => 'required|string'
        ]);

        $class = $this->getModel();
        $record = $class::where('content', $request->only('content'))->firstOrCreate($request->only('content'));
        
        return $record;
    }
}

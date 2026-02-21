<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController
{
    public function testAction(Request $request)
    {
        $name = trim((string) $request->input('name', ''));
        $randomNumber = $request->input('randomNumber');
        $selectMulti = $request->input('selectMulti');

        $randomNumber = is_numeric($randomNumber) ? (int) $randomNumber : null;
        $selectMulti = is_numeric($selectMulti) ? (int) $selectMulti : null;

        $finalNumber = null;
        if ($request->isMethod('post') && $randomNumber !== null && $selectMulti !== null) {
            $finalNumber = $randomNumber * $selectMulti;
        }

        return view('test', [
            'name' => $name,
            'randomNumber' => $randomNumber,
            'selectMulti' => $selectMulti,
            'finalNumber' => $finalNumber,
        ]);
    }
}

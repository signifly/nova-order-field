<?php

use Illuminate\Support\Facades\Route;
use Signifly\Nova\Fields\Order\Http\FieldRequestHandler;

Route::post('{resource}', OrderFieldRequestHandler::class);

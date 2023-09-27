<?php

function makeCarbon($dateTime)
{
    return Carbon\Carbon::parse($dateTime)->format('d-m-Y h:i A');
}

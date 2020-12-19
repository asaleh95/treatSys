@component('mail::message')
# Introduction

Reset Password.

@component('mail::button', ['url' => $code])
{{ $code }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

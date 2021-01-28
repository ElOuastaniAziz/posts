@component('mail::message')
# Tu post ha recibido un like

{{$liker->name}} le ha gustado uno de tus posts

@component('mail::button', ['url' => route('posts.show',$post)])
	Ver post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

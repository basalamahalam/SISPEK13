<x-mail::message>
# Welcome

Dear {{ $email }}

We look forward to communicating more with you. For more information visit our blog.

<x-mail::button :url="'https://laraveltuts.com'">
Blog
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

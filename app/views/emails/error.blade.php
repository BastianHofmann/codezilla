{{ $exception->getStatusCode() }} - {{ Request::url() }} @if(Auth::check()) - {{ Auth::user()->id }} @endif
<li class="dropdown">
  <a href="{{ route('services') }}">Services</a>
  <ul>
    @foreach ($services as $service)
      <li><a href="{{ route('service', ['service' => $service->id]) }}">{{ $service->name }}</a></li>
    @endforeach
  </ul>
</li>

<div class="section padding-top-bottom-small background-black">
    <div class="container-fluid px-5">
        <div class="row">
            <div class="col-md-6 footer text-center text-md-left">
                <p>{{ date('Y') }} © NASHA</p>
            </div>
            <div class="col-md-6 mt-4 mt-md-0 text-center">
                <div class="social-wrap on-footer">
                    {{ __('follow us') }}
                    <ul>
                        @foreach ($socialLinks as $platform => $url)
                            @if (!empty($url))
                                <li><a href="{{ $url }}" class="cursor-link" target="_blank">{{ $platform }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>                
            </div>
        </div>
    </div>
</div>

<div class="scroll-to-top cursor-link"></div>
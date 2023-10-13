@if( !empty( $services ) && $services->count() > 0 )
<section class="service-area section-padding-top" id="about-page">
	<div class="container">
		<div class="row">
			@foreach($services as $service)
			<div class="col-lg-4 {{ $loop->index > 2 ? 'mt-4' : '' }}">
				<div class="single-service">
					<h3 class="title wow fadeInRight" data-wow-delay="0.{{$loop->index + 2}}s">{{ $service->name }}</h3>
					<div class="desc wow fadeInRight" data-wow-delay="0.4s">
						<p>{{ $service->content }}</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endif
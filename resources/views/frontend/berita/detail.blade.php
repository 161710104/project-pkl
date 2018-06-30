@extends('frontend.master')
@section('content')
@include('frontend.partials.headertop')
        @include('frontend.partials.nav')
<br>

<section class="features-top-area" id="features">
		<div class="container">
            <div class="row promo-content">
					<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center"><font color="black">Berita</font></h2>
						<div class="single-blog-post">
							<center><h3>{{$beritaku->judul}}</h3></center>
							Diperbarui pada: <?php echo date('d F Y' , strtotime($beritaku->created_at));?>
							<a href="">
								<img src="{{asset('/img/'.$beritaku->gambar.'')}} " width="200" height="200">
							</a>
						</div>
						<p>{!! $beritaku->isi !!}</p> <br>

					</div><!--/blog-post-area-->
				</div>
				
				<div class="col-sm-3">
					@include('frontend.partials.merk')
					@include('frontend.berita.partials')
				</div>

			</div>
		</div>
	</section>
	<br>
@endsection

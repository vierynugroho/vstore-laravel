@extends('layouts.success')

@section('title')
    Success Page
@endsection

@section('content')
    <!-- Page Content -->
<div class="page-content page-success">
			<section class="section-success" data-aos="zoom-in">
				<div class="container">
					<div class="row align-items-center row-login justify-content-center">
						<div class="col-lg-6 text-center">
							<img src="/assets/images/success.svg" alt="success" class="mb-4" />
							<h2>Welcome to Store</h2>
							<p>
								Kamu sudah berhasil terdaftar <br />
								bersama kami. let's grow up now
							</p>
							<div>
								<a href="/dashboard.html" class="btn btn-success w-50 mt-4">My Dashboard</a>
							</div>
							<div>
								<a href="/dashboard.html" class="btn btn-signup w-50 mt-2">Go To Shopping</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
 @endsection

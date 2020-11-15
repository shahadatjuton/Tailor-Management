
<!-- Footer top section -->
<section class="footer-top-section home-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-8 col-sm-12">
                <div class="footer-widget about-widget">
                    <h4 class="fw-title">Tailor Management System</h4>
                    <p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam fringilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
                    <div class="cards">
                        <img src="{{asset('assets/frontend/')}}/img/cards/5.png" alt="">
                        <img src="{{asset('assets/frontend/')}}/img/cards/4.png" alt="">
                        <img src="{{asset('assets/frontend/')}}/img/cards/3.png" alt="">
                        <img src="{{asset('assets/frontend/')}}/img/cards/2.png" alt="">
                        <img src="{{asset('assets/frontend/')}}/img/cards/1.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="footer-widget">
                    <h6 class="fw-title">Categories</h6>
                    @php
                        $categories = \App\Category::all();
                    @endphp
                    <ul>
                        @foreach($categories as $category)
                        <li><a href="{{route('category.dress',$category->name)}}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="footer-widget">
                    <h6 class="fw-title">Contact</h6>
                    <div class="text-box">
                        <p>Taylor Shop Management </p>
                        <p>Dhaka </p>
                        <p>+880123456789</p>
                        <p>managementtailor@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer top section end -->

<!-- Footer section -->
<footer class="footer-section">
    <div class="container">
        <p class="copyright text-center"  style="font-size: 40px">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved.
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
    </div>
</footer>
<!-- Footer section end -->

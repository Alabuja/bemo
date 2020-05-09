<section class="footer">
    <footer class="container">		
        <div class="row">
            <div class="col-md-10">
                Copyright &copy; {{date('Y')}} BeMo Academic Consulting Inc. All rights reserved. 
                <a href="http://www.cdainterview.com/disclaimer-privacy-policy.html"target="_blank">
                    <span style="text-decoration:underline;">Disclaimer & Privacy Policy</span>
                </a> 
                <a href="#" id="rw_email_contact"><span style="text-decoration:underline;">Contact Us</span></a>
            </div>
            <div class="col-md-2">
                <ul>
                    @if(!empty($setting->facebook_url))
                    <li><a href="{{url($setting->facebook_url)}}"><i class="fab fa-facebook"></i></a></li>
                    @endif
                    @if(!empty($setting->twitter_url))
                    <li><a href="{{url($setting->twitter_url)}}"><i class="fab fa-twitter"></i></a></li>
                    @endif
                    
                </ul>
            </div>
        </div>
    </footer>
</section>
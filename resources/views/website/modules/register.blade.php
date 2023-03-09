
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from yoddenhtml.websitelayout.net/contactus.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Aug 2022 13:50:19 GMT -->
<head>

    <!-- metas -->
    <meta charset="utf-8">
    <meta name="author" content="Website Design Templates">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="keywords" content="Broadband & Internet Services HTML Template">
    <meta name="description" content="Yodden - Broadband & Internet Services HTML Template">

    <!-- title  -->
    <title>Yodden - Broadband & Internet Services HTML Template</title>

    <!-- favicon -->
    <link rel="shortcut icon" href=" {{ asset('website/img/logos/favicon.png') }}">
    <link rel="apple-touch-icon" href=" {{ asset('website/img/logos/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href=" {{ asset('website/img/logos/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href=" {{ asset('website/img/logos/apple-touch-icon-114x114.png') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- plugins -->
    <link rel="stylesheet" href=" {{ asset('website/css/plugins.css') }} ">

    <!-- search css -->
    <link rel="stylesheet" href=" {{ asset('website/search/search.css') }} ">

    <!-- quform css -->
    <link rel="stylesheet" href=" {{ asset('website/quform/css/base.css') }} ">

    <!-- theme core css -->
    <link href=" {{ asset('website/css/styles.css') }} " rel="stylesheet">

</head>

<body>

    <!-- PAGE LOADING
    ================================================== -->
    <div id="preloader"></div>

    <!-- MAIN WRAPPER
    ================================================== -->
    <div class="main-wrapper">

        

        <!-- PAGE TITLE
        ================================================== -->
        <section class="top-position1 py-0">
            <div class="page-title-section bg-img cover-background left-overlay-dark" data-overlay-dark="7" data-background=" {{ asset('website/imgbg/bg-03.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Contact Us</h1>
                            <div class="breadcrumb">
                                <ul>
                                    <li><a href="{{route('website.index')}}">Home</a></li>
                                    <li><a href="#!">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="page-title-shape1 d-none d-sm-block"></span>
            <span class="page-title-shape2 d-none d-sm-block"></span>
            <div class="d-inline-block p-2 border-secondary border border-width-2 position-absolute left-5 bottom-10 bottom-sm-25 ani-left-right z-index-1"></div>
            <div class="d-inline-block p-2 bg-secondary rounded-circle position-absolute right-40 top-25 ani-move z-index-1"></div>
        </section>

        <!-- CONTACT FORM
        ================================================== -->
        <section>
            <div class="container">
                <div class="section-heading">
                    <span class="subtitle">Send Us Message</span>
                    <h2>Stay Conected <span class="font-weight-400">With Us</span></h2>
                </div>
                <div class="row">
                    <div class="col-lg-10 col-xl-8 mx-auto">
                        <div class="p-1-9 p-md-5 border border-color-extra-light-gray border-radius-10">
                            <form action="{{route('website.store')}}" method="post" enctype="multipart/form-data" onclick="">
                                @csrf
                                <div class="quform-elements">
                                    <div class="row">
                                        <h2 class="mb-4 h3">Drop Message For Any Query</h2>
                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="name">Your Name <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="name" type="text" name="Fullname" placeholder="Your name here">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="email">Your Email <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="email" type="text" name="Email" placeholder="Your email here">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Text input element -->
                                        
                                        <!-- End Text input element -->

                                        <!-- Begin Text input element -->
                                        <div class="col-md-12">
                                            <div class="quform-element form-group">
                                                <label for="phone">Contact Number</label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="phone" type="text" name="Phonenumber" placeholder="Your phone here">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="quform-element form-group">
                                                <label for="phone">Address</label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="address" type="text" name="Address" placeholder="Your phone here">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="quform-element form-group">
                                                <label for="phone">Note</label>
                                                <div class="quform-input">
                                                    <textarea name="Note" id="note" class="form-control"  placeholder="Enter your note here..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Textarea element -->

                                        <!-- End Textarea element -->

                                        <!-- Begin Captcha element -->
                                        <!-- End Captcha element -->

                                        <!-- Begin Submit button -->
                                        <div class="col-md-12">
                                            <div class="quform-submit-inner">
                                                <button class="butn" type="submit">Send Message</button>
                                            </div>
                                            <div class="quform-loading-wrap text-start"><span class="quform-loading"></span></div>
                                        </div>
                                        <!-- End Submit button -->

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <img src=" {{ asset('website/img/content/line-01.png') }}" class="position-absolute top-15 right-5 ani-top-bottom d-none d-sm-inline-block" alt="...">
            <div class="d-inline-block p-2 border-secondary border border-width-2 position-absolute left-5 bottom-25 ani-left-right"></div>
            <div class="d-inline-block p-2 bg-secondary rounded-circle position-absolute left-10 top-25 ani-move"></div>
        </section>

        <!-- CONTACT INFO
        ================================================== -->
        <section class="p-0 bg-light">
            <div class="row p-0">
                <div class="col-lg-6 col-xxl-4 p-0">
                    <div class="p-1-6 p-sm-6 p-lg-8">
                        <div class="section-heading">
                            <span class="subtitle">Contacts</span>
                            <h2>Get In <span class="font-weight-400">Touch</span></h2>
                        </div>
                        <div class="card border-color-extra-light-gray border-radius-10 mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-map-marker-alt contact-icon-box mb-0"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-4">
                                        <h3 class="h4">Location</h3>
                                        <p class="mb-0 w-sm-80 display-md-28">66 Guild Street 512B, Great North Town.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-color-extra-light-gray border-radius-10 mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-phone-alt contact-icon-box mb-0"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-4">
                                        <h3 class="h4">Phone</h3>
                                        <p class="mb-1 display-md-28">(+44) 123 456 789</p>
                                        <p class="mb-0 display-md-28">(+44) 152-567-987</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-color-extra-light-gray border-radius-10">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="far fa-envelope contact-icon-box mb-0"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-4">
                                        <h3 class="h4">Email</h3>
                                        <p class="mb-1 display-md-28">info@example.com</p>
                                        <p class="mb-0 display-md-28">info@domain.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-8 p-0">
                    <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=960&amp;height=781&amp;hl=en&amp;q=385 man thiện&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://mcpenation.com/">https://mcpenation.com</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:781px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:781px;}.gmap_iframe {height:781px!important;}</style></div>
                </div>
            </div>
        </section>

        <!-- FOOTER
        ================================================== -->
        @include('website.modules.footer')

    </div>

    <!-- BUY TEMPLATE
    ================================================== -->
    <div class="buy-theme alt-font d-none d-lg-inline-block"><a href="https://themeforest.net/item/yodden-broadband-internet-services-html-template/37151476" target="_blank"><i class="fas fa-cart-plus"></i><span>Buy Template</span></a></div>

    <div class="all-demo alt-font d-none d-lg-inline-block"><a href="https://themeforest.net/user/websitedesigntemplates" target="_blank"><i class="far fa-envelope"></i><span>Quick Question?</span></a></div>

    <!-- SCROLL TO TOP
    ================================================== -->
    <a href="#!" class="scroll-to-top"><i class="fa-solid fa-wifi" aria-hidden="true"></i></a>

    <!-- all js include start -->

    <script>
        $(document).ready(function()
        {
            $(".butn" ).click(function() {
                if($("#name").val()!='')
            {
                if($("#email").val()!='')
                {
                    if($("#phone").val()!='')
                    {
                        if($("#address").val()!='')
                        {
                            if($("#note").val()!='')
                            {
                                alert('Thông tin đã được gửi đi, vui lòng chờ trong giây lát sẽ có nhân viên gọi cho bạn');
                            }
                        }
                        else{
                                alert('Vui lòng nhập địa chỉ');
                            }
                    }
                    else{
                                alert('Vui lòng nhập sdt, địa chỉ');
                            }
                }
                else{
                                alert('Vui lòng nhập email, sdt, địa chỉ');
                            }
            }
            else{
                                alert('Vui lòng nhập tên, email, số điện thoại và địa chỉ');
                            }
            });
            
        })
    </script>

    <!-- jQuery -->
    <script src=" {{ asset('website/js/jquery.min.js') }} "></script>

    <!-- popper js -->
    <script src=" {{ asset('website/js/popper.min.js') }} "></script>

    <!-- bootstrap -->
    <script src=" {{ asset('website/js/bootstrap.min.js') }} "></script>

    <!-- jquery -->
    <script src=" {{ asset('website/js/core.min.js') }} "></script>

    <!-- Search -->
    <script src=" {{ asset('website/search/search.js') }} "></script>

    <!-- custom scripts -->
    <script src=" {{ asset('website/js/main.js') }} "></script>

    <!-- form plugins js -->
    <script src=" {{ asset('website/quform/js/plugins.js') }} "></script>

    <!-- form scripts js -->
    <script src=" {{ asset('website/quform/js/scripts.js') }} "></script>

    <!-- all js include end -->

</body>


<!-- Mirrored from yoddenhtml.websitelayout.net/contactus.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Aug 2022 13:50:35 GMT -->
</html>
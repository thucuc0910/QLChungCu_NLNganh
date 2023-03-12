@extends('user.main')

@section('user.content')
<!-- Slider -->
<section class="section-slide p-b-70">
    <div class="wrap-slick1 rs2-slick1 ">
        <div class="slick1">
            <div class="item-slick1" style="background-image:url(/template/admin/img/slider/slider1.jpg">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-slick1" style="background-image:url(/template/admin/img/slider/slider3.jpg">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-slick1" style="background-image:url(/template/admin/img/slider/slider2.jpg">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content -->
<div class="page_contact p-b-70">
    <div class="container">
        <div class="row">
            <!-- Form liên hệ -->
            <div class="select_maps col-md-4 col-sm-12 col-xs-12">
                <div class="aa mid_fot_h contact_r">
                    <ul class="contact padding-0">
                        <li class="li_footer_h">
                            <span class="txt_content_child">
                                <i class="fas fa-map-marker-alt"></i>
                                <span class="add">
                                    Đ. 3/2, Xuân Khánh, Ninh Kiều, Cần Thơ, Việt Nam
                                </span>
                            </span>
                        </li>
                        <li class="li_footer_h">
                            <i class="fas fa-mobile-alt"></i>

                            <a href="tel:19006750">19006750</a>

                        </li>
                        <li class="li_footer_h">
                            <i class="far fa-envelope"></i>

                            <a href="mailto:coolteam@gmail.com"> sunhouse@gmail.com</a>

                        </li>
                    </ul>
                </div>


                <div class="page-login page_cotact">

                    <h1 class="title-head-contact a-left"><span>Liên hệ với chúng tôi</span></h1>
                    <div id="pagelogin" class="margin-top-0">
                        <form method="post" action="/postcontact" id="contact" accept-charset="UTF-8"><input name="FormType" type="hidden" value="contact"><input name="utf8" type="hidden" value="true"><input type="hidden" id="Token-eeeca2cd5d09455dab56d9ab390f40f4" name="Token" value="03AFY_a8VWB6lkP5g3C_7xlZ-KhaSShaklex-OhkpvP_iKKZrkclJjjWo6yJ1TZu97iEuo7BHVJbWk2s4usB7X1MlS1OAj6bW5v0lLYJuj0CqVuitvsFiHpCTsJD8YcapG4NO8tTyCGqR12worldBZ10uFymTiIk01TmmGP-5oxhUtFRP55f4-Wsh_E2z37dEKNcFT3stI53SHdsjZS_1BPIijgZFRgRCHkbQGKm2oXYkpFe-gYvft52ifbeJLDWzxbv9-iNJ_zj5bHvUFDzdIp7hnSNquzMucs6WsHqxtgUu5wwG3EsAweYuyVEUNIBi7OBZehfCGL8IWLOoZCeh8vJGWbOlDq78XkNqisySouYGK8s84juIltGAMu1MDllX5zu-fwYVMIJAgR3EVW0arM-E1ZwllPhJsoLH1kPNGefDh4YSG_a4pYeoEWanBdDTqQuBlB-XUz26DjbUkeFNEm_TKgAYwaN-pAqsav1yeB7WdAXpWCz-CM5D4fhHEjQLSLXpy_mC0cq57fOfMmKElmEUBAMKC0ojgPg">
                            <script src="https://www.google.com/recaptcha/api.js?render=6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK"></script>
                            <script>
                                grecaptcha.ready(function() {
                                    grecaptcha.execute("6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK", {
                                        action: "contact"
                                    }).then(function(token) {
                                        document.getElementById("Token-eeeca2cd5d09455dab56d9ab390f40f4").value = token
                                    });
                                });
                            </script>


                            <div class="form-signup clearfix">
                                <div class="row group_contact">
                                    <fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input placeholder="Họ và tên" type="text" class="form-control  form-control-lg" required="" value="" name="contact[Name]">
                                    </fieldset>
                                    <fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input placeholder="Email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="" id="email1" class="form-control form-control-lg" value="" name="contact[email]">
                                    </fieldset>
                                    <fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <textarea placeholder="Nội dung" name="contact[body]" id="comment" class="form-control content-area form-control-lg" rows="5" required=""></textarea>
                                    </fieldset>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-comment button_gradient">Gửi liên hệ</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Bản đồ -->
            <div class="select_maps col-md-8 col-sm-12 col-xs-12">
                <div class="section_mapss margin-bottom-50" style="height:500px">
                    <div class="box-maps">
                        <div class="iFrameMap">
                            <div class="google-map" style="width:5000px">
                                <div id="contact_map" class="map" style="height:500px">
                                    <iframe style="height:500px; width:720px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15715.73357121595!2d105.77034015000001!3d10.0223554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0895a51d60719%3A0x9d76b0035f6d53d0!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBD4bqnbiBUaMah!5e0!3m2!1svi!2s!4v1678468633409!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    <!-- <iframe style="height:500px; width:720px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.91200565666!2d105.81368971529523!3d21.03620659289907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab128d511a8d%3A0x3440d4c5d63f693!2zMjY2IMSQ4buZaSBD4bqlbiwgTGnhu4V1IEdpYWksIEJhIMSQw6xuaCwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1553499875578" allowfullscreen=""></iframe> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
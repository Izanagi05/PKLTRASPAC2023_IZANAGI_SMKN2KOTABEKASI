<template>
    <div>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col col-lg-5">
                        <img src="/assets/img/logofooter.png" class="" alt="" height="100px">
                        <p class="text-white">Lumecolors adalah brand kecantikan dengan pilihan warna yang cocok untuk kulit
                            orang Asia, membuat kamu nyaman menggunakan lumecolors sepanjang hari.</p>
                    </div>
                    <div class="col col-lg-3 col-md-4">
                        <h5 class="text-white">QUICK LINKS</h5>
                        <ul class="navbar-nav">
                            <li class="">
                                <nuxt-link to="/" class="text-decoration-none text-white">Location</nuxt-link>
                            </li>
                            <li class="">
                                <nuxt-link to="/" class="text-decoration-none text-white">Our Blog</nuxt-link>
                            </li>
                            <li class="">
                                <nuxt-link to="/" class="text-decoration-none text-white">Contact Us</nuxt-link>
                            </li>
                            <li class="">
                                <nuxt-link to="/" class="text-decoration-none text-white">Privacy Policy</nuxt-link>
                            </li>
                        </ul>
                    </div>
                    <div class="col col-lg-8 col-md-8">
                        <h5 class="text-white">SUBSCRIBE NEWSLETTER</h5>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-white" placeholder="Masukan Email Anda"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-footer" type="button" id="button-addon2 ">SUBSCRIBE</button>
                        </div>
                        <p class="text-justify footer-text3 text-white">Let's keep in touch!
                            Join our newsletter. so that we reach out to you with our best news and offers</p>
                            <div class="sosmed d-flex align-items-center gap-3">
                                <div class="">
                                    <nuxt-link to="/" class="">
                                        <img src="/assets/icon/iconsp.png" width="25px" alt=""  class="mr-3" srcset="">
                                    </nuxt-link>
                                    </div>
                                <div class="">
                                    <nuxt-link to="/" class="">
                                        <img src="/assets/icon/iconsp.png" width="25px" alt=""  class="mr-3" srcset="">
                                    </nuxt-link>
                                    </div>
                                <div class="">
                                    <nuxt-link to="/" class="">
                                        <img src="/assets/icon/iconsp.png" width="25px" alt=""  class="mr-3" srcset="">
                                    </nuxt-link>
                                    </div>
                                <div class="">
                                    <nuxt-link to="/" class="">
                                        <img src="/assets/icon/iconsp.png" width="25px" alt=""  class="mr-3" srcset="">
                                    </nuxt-link>
                                    </div>
                              
                              
                            </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<style>
footer {
    padding-top: 48px;
    background: #E3949A;
}
.footer-text3{
    line-height: 24px;
}
.btn-footer{
    background: #EE5C68;
}
.sosmed{
    margin-bottom: 24px;
}
</style>
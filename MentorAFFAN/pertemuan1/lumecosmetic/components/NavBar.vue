<template>

    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light py-2">
  <div class="container-fluid ">
    <div class="imglogo">
        <img src="/assets/img/logo1.png"    width="150px"  alt="" srcset="">
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav fw-bolder ms-auto">
        <li class="nav-item">
          <nuxt-link  class="nav-link active" aria-current="page" to="/">SHOP</nuxt-link>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            PRODUCT
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><nuxt-link class="dropdown-item fw-normal" to="/" ></nuxt-link></li>
            <li><nuxt-link class="dropdown-item fw-normal " to="/">Another action</nuxt-link></li>
            <li><nuxt-link class="dropdown-item fw-normal" to="/">Something else here</nuxt-link></li>
          </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#">BEAUTY LOUNGE</a>
        </li>
        <li class="nav-item">
          <nuxt-link class="nav-link" to="/">CONTACT US</nuxt-link>
        </li>
        <li class="nav-item">
          <nuxt-link class="btn btn-login  text-white" to="/">LOGIN</nuxt-link>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </div>
</template>
<style scoped>


.navbar{
    padding: 0px 68px;
}
.btn-login{
    background: #E8959B;
    padding:8px 28px;
    border-radius: 10px;
}
</style>
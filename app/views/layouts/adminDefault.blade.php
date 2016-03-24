<!DOCTYPE html>
<html lang="en">
@include('includes.header')

<body >
<section id="container" class="">
    @include('admin.topMenu')
    @include('admin.sideBar')
    <section id="main-content">
        <section class="wrapper site-min-height">
            @yield('content')
        </section>
    </section>

    @include('includes.footer')


</body>
</html>
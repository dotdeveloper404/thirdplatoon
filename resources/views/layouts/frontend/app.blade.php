<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">



@include('layouts.frontend.partials.head')

<body>
    <section class="banner-area">

        @include('layouts.frontend.partials.header')

        <div class="banner-content-area">
            <h2>Discover the</h2>
            <h2>Best Jobs For You</h2>
            <h5>Find great ooportunities, hire and post jobs</h5>
            <a href="#">SEE POSTS</a>
        </div>

    </section>

    <section class="form-area">
        <div class="container">
            <form>
                <input type="text" name="" placeholder="Enter Keyword">

                <select>
                    <option>all categories</option>
                    <option>category 1</option>
                    <option>category 2</option>
                    <option>category 3</option>
                </select>

                <input type="text" name="">
                <select>
                    <option>select price rating</option>
                    <option> 1</option>
                    <option> 2</option>
                    <option> 3</option>
                </select>

                <input type="submit" name="" value="search">
            </form>
        </div>
    </section>


    @yield('content')

    @include('layouts.frontend.partials.footer')

</body>

</html>
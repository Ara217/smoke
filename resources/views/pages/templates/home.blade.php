@extends('pages.main')
@section('title', 'Американские сигареты и импортные сигареты из Европы')

@section('smoke_content')
    <main class="main-block">
        <div class="row content-block">
            <div class="mx-auto col-md-8">
                <div class="wrapper">
                    <!-- Sidebar Holder -->
                @include('pages.templates.left-side-bar')
                <!-- Page Content Holder -->
                    <div id="content">
                        <div id="carousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel" data-slide-to="1"></li>
                                <li data-target="#carousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img class="d-block img-fluid" src="{{asset('images/habanos-thurs-4-1600.jpg')}}" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid" src="{{asset('images/DSC00844.jpg')}}" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid" src="{{asset('images/maxresdefault.jpg')}}" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        @include('pages.templates.menu-button')
                        <h1 class="subject">Американские сигареты, как и европейские – эталон качества</h1>
                        <div class="">
                            <div>Истинные ценители табачных изделий всегда предпочтут оригинальные&nbsp;отечественным, ведь в этом случае они могут рассчитывать на вкус и   качество продукции, четко соответствующее заявленным стандартам. По   признанию многих потребителей, европейские сигареты по составу   отличаются от аналогичных марок из США, но это отличие отнюдь не во вред   – они просто немного иные. Табачные корпорации уже давно официально   заявляли, что для разных стран состав табака в одноименных сигаретах   различен, и здесь нужно признать, что российские в этом   отношении уникальны – сравнивать их не имеет смысла. Несмотря на одинаковые названия, отечественные и сигареты из США не имеют ничего общего.</div>
                            <br>
                            <div>Но перед теми, кто привык постоянно курить только настоящие сигареты,   и перед теми, кто лишь иногда позволяет себе подобное «баловство»,   время от времени встает вопрос о пополнении запасов. Здесь возможны   различные варианты – можно поискать оригинальные сигареты в специализированных магазинах, можно найти информацию о продаже в интернете, а можно обратиться в службу доставки.</div>
                            <br>
                            <div>Не так давно сигареты duty free были практически единственной возможностью для российских потребителей сравнить сигареты из Америки или, скажем, Европы, с &nbsp;отечественными. Альтернативой таким магазинам были родственники и друзья, которые привозили настоящие сигареты из дальних стран. Сегодня можно приобрести оригинальные сигареты американского происхождения в интернет магазинах, заказать их в службе доставки и быть уверенным в   высоком качестве полученной продукции. Мы предлагаем вам качественные и   оригинальные европейские &nbsp;и сигареты из США по приемлемым ценам, а доставка на дом будет приятным дополнением к удачному выбору.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
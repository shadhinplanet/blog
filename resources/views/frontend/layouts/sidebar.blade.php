<aside class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 tm-aside-r">

    <div class="tm-aside-container">
        <h3 class="tm-gold-text tm-title">
            Categories
        </h3>
        <nav>
            <ul class="nav">
                @foreach ($categories as $item)
                <li><a href="{{ $item->slug }}" class="tm-text-link">{{ $item->name }}</a></li>
                @endforeach
            </ul>
        </nav>
        <hr class="tm-margin-t-small">
        <h3 class="tm-gold-text tm-title tm-margin-t-small">
            Useful Links
        </h3>
        <nav>
            <ul class="nav">
                <li><a href="#" class="tm-text-link">Suspendisse sed dui nulla</a></li>
                <li><a href="#" class="tm-text-link">Lorem ipsum dolor sit</a></li>
                <li><a href="#" class="tm-text-link">Duiss nec purus et eros</a></li>
                <li><a href="#" class="tm-text-link">Etiam pulvinar et ligula sed</a></li>
                <li><a href="#" class="tm-text-link">Proin egestas eu felis et iaculis</a></li>
            </ul>
        </nav>
        <hr class="tm-margin-t-small">

        <div class="tm-content-box tm-margin-t-small">
            <a href="#" class="tm-text-link">
                <h4 class="tm-margin-b-20 tm-thin-font">Duis sit amet tristique #1</h4>
            </a>
            <p class="tm-margin-b-30">Vestibulum arcu erat, lobortis sit amet tellus ut, semper tristique
                nibh. Nunc in molestie elit.</p>
        </div>
        <hr class="tm-margin-t-small">
        <div class="tm-content-box tm-margin-t-small">
            <a href="#" class="tm-text-link">
                <h4 class="tm-margin-b-20 tm-thin-font">Duis sit amet tristique #2</h4>
            </a>
            <p>Vestibulum arcu erat, lobortis sit amet tellus ut, semper tristique nibh. Nunc in molestie
                elit.</p>
        </div>
        <hr class="tm-margin-t-small">
        <div class="tm-content-box tm-margin-t-small">
            <a href="#" class="tm-text-link">
                <h4 class="tm-margin-b-20 tm-thin-font">Duis sit amet tristique #3</h4>
            </a>
            <p>Vestibulum arcu erat, lobortis sit amet tellus ut, semper tristique nibh. Nunc in molestie
                elit.</p>
        </div>
    </div>


</aside>

<x-app-layout>
    <div class="masterhead">
        <section id="home">
            <header>
                <div class="overlay"></div>
                <video playsinline autoplay muted loop>
                    <source src="{{ asset('/videos/cleaning-x4.mp4') }}" type="video/mp4">
                </video>
                <div class="container h-100">
                    <div class="d-flex h-100 text-center align-items-center">
                    <div class="w-100 text-white">
                        <h1 class="display-3">Bienvenue au CREPIS</h1>
                        <p class="lead mb-0">Centre de Recherches et d'Expérimentations Poétiques pour des Intérieurs Soutenables</p>
                    </div>
                    </div>
                </div>
            </header>
        </section>
    </div>

    <div class="container">
        <section id="about">
            <div class="container">
                <div class="row justify-content">
                    <div id="about-title" class="col-12 mb-4">
                        <h2>Bienvenue sur le site du <span class='text-success'>CR</span><span class='text-danger'>EP</span><span class='text-info'>IS</span><h2>
                        <h4 class="text-muted"> le <span class='text-success'>Centre de Recherches</span> et d'<span class='text-danger'>Expérimentations Poétiques</span> pour des <span class='text-info'>Intérieurs Soutenables.</span></h4>
                    </div>

                    <div class="p-4 mb-4 bg-light rounded-3">
                        <div class="container py-2">
                            <div class="col-12 fs-6">
                                En cette période de pandémie et de mutation des pratiques (tant économiques, que sociales, politiques, techniques, artistiques et écologiques), 
                                le groupe de recherche du <span class='text-success'>CR</span><span class='text-danger'>EP</span><span class='text-info'>IS</span> se saisit de la question des « <span class="fw-bold">intérieurs soutenables</span> ». 
                                Alors que nombre de situations quotidiennes deviennent plus énervantes, révoltantes, désespérantes, anxiogènes, pénibles, crispantes ou absurdes, le <span class='text-success'>CR</span><span class='text-danger'>EP</span><span class='text-info'>IS</span> travaille à formuler des stratégies aisément réappropriables pour vous permettre de souffler un peu, tenir le coup, décompresser ou tout simplement traverser au mieux ces temps confinés.</div>
                        </div>
                    </div>

                    <div class="row mt-4 mb-5">
                        <div class="col-4">
                            <h2 id="about-section-title">
                                <i class="bi bi-people"></i>
                            </h2>
                            
                            Bien plus qu'un think-tank, le <span class='text-success'>CR</span><span class='text-danger'>EP</span><span class='text-info'>IS</span> s'est construit dans un souci de collégialité centrée sur l’humain, partant du constat qu'efficience pouvait être conjuguée avec résilience.
                        </div>
                        <div class="col-4">
                            <h2 id="about-section-title">
                                <i class="bi bi-diagram-2"></i>
                            </h2>
                            Ses membres sont issu·e·s d'horizons différents mais tous animé·e·s d'une même motivation : chercher à <span class="fw-bold">décloisonner la pensée</span> au-delà des limites imposées par des mesures de confinement ou autres restrictions collectives/individuelles.
                        </div>
                        <div class="col-4">
                            <h2 id="about-section-title">
                                <i class="bi bi-award"></i>
                            </h2>
                            Grâce à une approche transdisciplinaire et holistique, dans le respect des gestes barrières et des standards de la recherche académique par les moyens de l'art (en toute indépendance et transparence), le <span class='text-success'>CR</span><span class='text-danger'>EP</span><span class='text-info'>IS</span> a su mettre à profit aussi bien la puissance de l'intelligence collective que les opportunités offertes par le digital.
                        </div>
                    </div>

                    <div class="col-12 mt-5">
                        Aujourd'hui, nos méthodes innovantes nous permettent de proposer des <span class="fw-bold">solutions de bien-être</span> pour tous et toutes.<br>
                        Mais le travail doit se poursuivre, et vous aussi pouvez être <span class='text-success'>acteur ou actrice</span> <span class='text-danger'>du</span> <span class='text-info'>processus</span> !  
                    </div>
                </div>
            </div>
        </section>
        <section id="methods">
            <div class="container">

                <div class="row text-center align-items-center">
                    <video id="methods-vid" autoplay muted loop>
                        <source src="{{ asset('/videos/push&pull-x1.5.mp4') }}" type="video/mp4">
                    </video>
                </div>

            </div>

        </section>
        <section id="team">
            <div class="container">

                <div class="row">
                    <div class="col-8">
                        <img id="team-img" src="{{ asset('/images/team.png') }}" alt="Notre équipe">
                    </div>
                    <div class="col-4 text-start">
                        <p>
                            <h5>Le <span class='text-success'>CR</span><span class='text-danger'>EP</span><span class='text-info'>IS</span> compte 3 laboratoires de recherche : </h5>
                            <ul>
                                <li class="text-success">La Famille Tout à Cramé</li>
                                <li class="text-danger">Le Droit à la Paresse</li>
                                <li class="text-info">Ma Sorcière Bien Aimée</li>
                            </ul>
                        </p>
                        <br>
                        <p>
                            <b>Louis Billon</b>,
                            <b>Morgane Blain</b>,
                            <b>Lisa Blanc</b>,
                            <b class="text-success">Julie Borrelli</b>,
                            <b>Alizée Bouchot</b>,
                            <b class="text-info">Mathilde Chénin</b>,
                            <b>Loni Cornelis</b>,
                            <b>Mariana De Souza</b>,
                            <b class="text-danger">David Gauthier</b>,
                            <b class="text-info">Caroline Gueye</b>,
                            <b class="text-danger">Amaury Guillermin</b>,
                            <b>Guillaume Grumel</b>,
                            <b class="text-danger">Nawal Guendouz</b>,
                            <b class="text-success">Florian Ingels</b>,
                            <b class="text-danger">Sylvianne Lathuillière</b>,
                            <b class="text-success">Camille Moriot</b>,
                            <b class="text-danger">Éric Pardoux</b>,
                            <b>Sacha Pasquier</b>,
                            <b class="text-success">Anissa Pomies</b>,
                            <b class="text-success">Karine Priot</b>,
                            <b class="text-info">Stella Ramos-Canut</b>,
                            <b>Clara Saleri Lunazzi</b>,
                            <b>Emil Tapissier</b>,
                            <b class="text-info">Florent Tournus</b>,
                            <b>Bruno Yvonnet</b>
                        </p>
                    </div>
                </div>
            </div>

        </section>
        <section id="solutions">
            <div class="container">

                <div class="row" id="app">
                    <carousel></carousel>
                </div>

                <div class="row text-center justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <a href="/generator" class="btn btn-lg btn-info fw-bold" role="Button">Participez à l'étude</a>
                    </div>

                </div>
            </div>

        </section>
    </div>
</x-app-layout>

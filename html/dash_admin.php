<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/master.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet"> 
    <title>Koala Ticket</title>
</head>
<body>
    <!-- Affichage  de la navigation est des articles -->
    <header class="header">
        <div class="menu">
            <div class="logo">
                <img src="images/koala.png" alt="Logo du site">
                <div class="line_vertical"></div>
                <a href="">Questions fréquentes</a>
            </div>
            <div class="user">
                <div class="user_box">
                    <div class="user_info">
                        <p class="user_name">Sébastien</p>
                        <p class="user_account">Compte client</p>
                    </div>
                    <div class="user_picture">
                        <img src="images/user.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Affichage des articles -->
        <div class="line_horizontal margin_line "></div>
    </header>
    <section class="statut_top">
        <div class="statut">
            <div class="statut_text margin_text">
                <p>Vous avez actuellement</p>
                <p>7 tickets ouverts</p>
            </div>
        </div>
    </section>
    <section class="ticket">

        <!-- boite blanche avec la liste des tickets -->
        <div class="opened">
            <h1>Tickets ouverts</h1>

            <table class="test">
                <thead>
                    <tr class="opened_title">
                        <td class="start_ticket">Dernière réponse</td>
                        <td>Sujet</td>
                        <td>Création</td>
                        <td>Numéro</td>
                        <td class="end_ticket">Etat du ticket</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="start_ticket"><img src="images/user.jpg" alt="" class="ticket_img"><p>Lucas <br> Le 10/10/2020</p></td>
                        <td>Impossible d'accéder à mon espace client</td>
                        <td>Le 10/10/2020</td>
                        <td>#234423</td>
                        <td class="end_ticket"><a href="" class="primary_btn_success">Répondu</a></td>
                        <tr style="height: 10px; background-color: transparent;"></tr>
                    </tr>
                    <tr>
                        <td class="start_ticket"><img src="images/user.jpg" alt="" class="ticket_img"><p>Lucas <br> Le 10/10/2020</p></td>
                        <td>Impossible d'accéder à mon espace client</td>
                        <td>Le 10/10/2020</td>
                        <td>#234423</td>
                        <td class="end_ticket"><a href="" class="primary_btn_success">Répondu</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- boite blanche avec la liste des tickets -->

        
        <!-- boite blanche avec la liste des tickets (version mobile)-->
        <div class="opened_mobile">
            <h1>Tickets ouverts</h1>
            <div class="ticket_box">
                <p>Je n'arrive pas à me connecter à mon compte client</p>
                <p>Dernière réponse le 07/10/2020</p>
                <a href="" class="primary_btn_success">Répondu</a>
            </div>
            <div class="ticket_box">
                <p>Je n'arrive pas à me connecter à mon compte client</p>
                <p>Dernière réponse le 07/10/2020</p>
                <a href="" class="primary_btn_success">Répondu</a>
            </div>
            <div class="ticket_box">
                <p>Je n'arrive pas à me connecter à mon compte client</p>
                <p>Dernière réponse le 07/10/2020</p>
                <a href="" class="primary_btn_success">Répondu</a>
            </div>
        </div>
        <!-- boite blanche avec la liste des tickets -->


        <!-- boite blanche avec la liste des tickets -->
        <div class="opened">
            <h1>Tickets fermé</h1>

            <table class="test">
                <thead>
                    <tr class="opened_title">
                        <td class="start_ticket">Dernière réponse</td>
                        <td>Sujet</td>
                        <td>Création</td>
                        <td>Numéro</td>
                        <td class="end_ticket">Etat du ticket</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="start_ticket"><img src="images/user.jpg" alt="" class="ticket_img"><p>Lucas <br> Le 10/10/2020</p></td>
                        <td>Impossible d'accéder à mon espace client</td>
                        <td>Le 10/10/2020</td>
                        <td>#234423</td>
                        <td class="end_ticket"><a href="" class="primary_btn_close">Fermé</a></td>
                        <tr style="height: 10px; background-color: transparent;"></tr>
                    </tr>
                    <tr>
                        <td class="start_ticket"><img src="images/user.jpg" alt="" class="ticket_img"><p>Lucas <br> Le 10/10/2020</p></td>
                        <td>Impossible d'accéder à mon espace client</td>
                        <td>Le 10/10/2020</td>
                        <td>#234423</td>
                        <td class="end_ticket"><a href="" class="primary_btn_close">Fermé</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- boite blanche avec la liste des tickets -->
        
    </section>
</body>
</html>
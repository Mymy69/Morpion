<?php
include("header.html")

?>

<body>
    <div class="container">
        <section class="col-lg-12">
            <h1>JEU DU MORPION</h1>
            <div id="Jeu">
                <div>
                    <button type="button" class="btn btn-dark" ></button>
                    <button type="button" class="btn btn-dark"></button>
                    <button type="button" class="btn btn-dark"></button>
                </div>
                <div>
                    <button type="button" class="btn btn-dark"></button>
                    <button type="button" class="btn btn-dark"></button>
                    <button type="button" class="btn btn-dark"></button>
                </div>
                <div>
                    <button type="button" class="btn btn-dark"></button>
                    <button type="button" class="btn btn-dark"></button>
                    <button type="button" class="btn btn-dark"></button>
                </div>
                
                <div id="StatutJeu"></div>
            </div>
            
        </section>
        
        
        
        
        
    </div>
    <!-- CONTENT START -->
    
    <script>
        function estValide(button)
        {
            return button.innerHTML.length == 0;
        }
        
        function setSymbol(btn, symbole)
        {
            btn.innerHTML = symbole;
        }
        
        function rechercherVainqueur(pions, joueurs, tour)
        {
            if (pions[0].innerHTML == joueurs[tour] &&
                pions[1].innerHTML == joueurs[tour] &&
                pions[2].innerHTML == joueurs[tour])
            {
                pions[0].style.backgroundColor = "#00b38f";
                pions[1].style.backgroundColor = "#00b38f";
                pions[2].style.backgroundColor = "#00b38f";
                return true;
            }
            
            if (pions[3].innerHTML == joueurs[tour] &&
                pions[4].innerHTML == joueurs[tour] &&
                pions[5].innerHTML == joueurs[tour])
            {
                pions[3].style.backgroundColor = "#00b38f";
                pions[4].style.backgroundColor = "#00b38f";
                pions[5].style.backgroundColor = "#00b38f";
                return true;
            }
            
            if (pions[6].innerHTML == joueurs[tour] &&
                pions[7].innerHTML == joueurs[tour] &&
                pions[8].innerHTML == joueurs[tour])
            {
                pions[6].style.backgroundColor = "#00b38f";
                pions[7].style.backgroundColor = "#00b38f";
                pions[8].style.backgroundColor = "#00b38f";
                return true;
            }
            
            if (pions[0].innerHTML == joueurs[tour] &&
                pions[3].innerHTML == joueurs[tour] &&
                pions[6].innerHTML == joueurs[tour])
            {
                pions[0].style.backgroundColor = "#00b38f";
                pions[3].style.backgroundColor = "#00b38f";
                pions[6].style.backgroundColor = "#00b38f";
                return true;
            }
            
            if (pions[1].innerHTML == joueurs[tour] &&
                pions[4].innerHTML == joueurs[tour] &&
                pions[7].innerHTML == joueurs[tour])
                {
                pions[1].style.backgroundColor = "#00b38f";
                pions[4].style.backgroundColor = "#00b38f";
                pions[7].style.backgroundColor = "#00b38f";
                return true;
            }
            
                if (pions[2].innerHTML == joueurs[tour] &&
                pions[5].innerHTML == joueurs[tour] &&
                pions[8].innerHTML == joueurs[tour])
            {
                pions[2].style.backgroundColor = "#00b38f";
                pions[5].style.backgroundColor = "#00b38f";
                pions[8].style.backgroundColor = "#00b38f";
                return true;
            }
            
                if (pions[0].innerHTML == joueurs[tour] &&
                pions[4].innerHTML == joueurs[tour] &&
                pions[8].innerHTML == joueurs[tour])
            {
                pions[0].style.backgroundColor = "#00b38f";
                pions[4].style.backgroundColor = "#00b38f";
                pions[8].style.backgroundColor = "#00b38f";
                return true;
            }
            
                if (pions[2].innerHTML == joueurs[tour] &&
                pions[4].innerHTML == joueurs[tour] &&
                pions[6].innerHTML == joueurs[tour])
            {
                pions[2].style.backgroundColor = "#00b38f";
                pions[4].style.backgroundColor = "#00b38f";
                pions[6].style.backgroundColor = "#00b38f";
                return true;
            }
            
        }
        
        function matchNul(pions)
        {
            for (var i = 0 ; i < pions.length; i++)
            {
                if (pions[i].innerHTML.length == 0)
                return false;
            }
            
            return true;
        }
        
        var Afficheur = function(element)
        {
            var affichage = element;
            
            function setText(message)
            {
                affichage.innerHTML = message;
            }
            
            return {sendMessage : setText};
        }
        
        function main()
        {   
            
            var pions = document.querySelectorAll("#Jeu button");
            var joueurs = ['X', 'O'];
            var tour = 0;
            var jeuEstFini = false;
            var afficheur = new Afficheur(document.querySelector("#StatutJeu"));
            afficheur.sendMessage("Le jeu peut commencer ! <br /> Joueur " + joueurs[tour] + " c'est votre tour.");
         
            for (var i = 0, len = pions.length; i < len; i++)
            {
                pions[i].addEventListener("click", function()
                {
                
                    
                    if (!estValide(this))
                    {
                        afficheur.sendMessage("Case occupée ! <br />Joueur " + joueurs[tour] + " c'est toujours à vous !");
                        
                    }
                    else
                    {
                        setSymbol(this, joueurs[tour]);
                        jeuEstFini = rechercherVainqueur(pions, joueurs, tour);
                        
                        if(jeuEstFini)
                        {
                            afficheur.sendMessage("Le joueur " + joueurs[tour] + " a gagné ! <br /> <a href=\"./Griche_Myriem_Martin_Caroline_Paitry_Robin_Morpion.html\">Rejouer</a>");
                            return;
                        }
                      
                        
                        if (matchNul(pions))
                        {
                            afficheur.sendMessage("Match Nul ! <br/> <a href=\"./index.php\">Rejouer</a>" );
                            return;
                        }
                        
                        tour++;
                        tour = tour % 2;
                        afficheur.sendMessage("Joueur " + joueurs[tour] + " c'est à vous !");
                    }
                    
                });
            }
        }
        
        main();
    </script>

    <?php
include("footer.html")

?>
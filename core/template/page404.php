<?php
namespace core\template;
class page404 
{
    public function __construct() {
        ?>
                    <style>
                        /* Style de base de la page */
                      html, body {
                           margin: 0;
                             padding: 0;
                             font-family: sans-serif;
                         }

                         /* Style du conteneur principal */
                         .container {
                             display: flex;
                             flex-direction: column;
                             align-items: center;
                             justify-content: center; 
                             align-items:center;
                             height: 100vh;
                         }

                         /* Style du titre de la page */
                         h1 {
                             font-size: 48px;
                             color: #333;
                             margin: 0;
                         }

                         /* Style du sous-titre de la page */
                         h2 {
                             font-size: 24px;
                             color: #666;
                             margin: 0;
                         }

                         /* Style du bouton de retour à la page d'accueil */
                         .home-button {
                             display: inline-block;
                             padding: 12px 24px;
                             background-color: #fff;
                             border: none;
                             border-radius: 4px;
                             font-size: 16px;
                             cursor: pointer;
                         }

                         .home-button:hover {
                             background-color: #eee;
                         }
                     </style>

                    <div class="container">
                        <h1>🤕 404 Not Found 🤕</h1>
                        <h1>Oups, page non trouvée</h1>
                        <h2>La page que vous cherchez semble introuvable.</h2>
                        <button class="home-button" onclick="location.href='<?=base_url?>'">Retour à l'accueil</button>
                    </div>
                    <?php
    }
}

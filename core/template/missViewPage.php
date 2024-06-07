<?php
namespace core\template;
class missViewPage 
{
    public function __construct($template) {
        ?>
            <html>

            <head>
                <title>Erreur de template</title>
                <style>
                    body {
                        font-family: sans-serif;
                        background-color: #eee;
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                    }

                    h1 {
                        font-size: 5em;
                    }


                    h2 {
                        color: #606060;
                        font-size: 3em;
                    }
                </style>
            </head>

            <body>
                <h1>😵</h1>
                <h2>Template [<?=$template?>]  Non Trouvé !</h2>
            </body>

            </html>
<?php
    }
}

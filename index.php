<?php Header("Cache-Control: max-age=3000, must-revalidate"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Rodrigo Ferreira | Developer</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css"
        />
        <link rel="stylesheet" href="/css/index/hero.css" />
        <link rel="stylesheet" href="/css/index/hidden.css" />
        <link rel="stylesheet" href="/css/index/about.css" />
        <link rel="stylesheet" href="/css/index/skills.css" />
        <link rel="stylesheet" href="/css/index/projects.css" />
        <link rel="stylesheet" href="/css/index/contact.css" />
        <link rel="stylesheet" href="/css/index/main.css" />

    </head>
    <body class="header finisher-header">
        
        <?php include "main_page/hero.html" ?>

        <?php include "main_page/about.html" ?>

        <?php include "main_page/skills.html" ?>

        <?php include "main_page/projects.html" ?>

        <?php include "main_page/contacts.html" ?>

        <script
            src="js/finisher-header.es5.min.js"
            type="text/javascript"
        ></script>
        <script type="text/javascript">

            //LIMIT THE SIZE OF HEADER UNTIL THE CONTACTS SECTION
            window.addEventListener('DOMContentLoaded', (event) => {
                // Get the position of the .contact element relative to the viewport
                const contactSection = document.querySelector('.contact');
                const canvas = document.getElementById("finisher-canvas");

                function modifyCanvasHeight() {
                    // Get the current position of .contact
                    const contactSectionPosition = contactSection.getBoundingClientRect();
                    
                    // Set the height of the canvas to the top position of .contact
                    canvas.style.height = contactSectionPosition.top + 'px';
                    
                    // Log the position for demonstration
                    console.log('Canvas height set to:', canvas.style.height);
                }

                modifyCanvasHeight();
            });

            new FinisherHeader({
                count: 110,
                size: {
                    min: 2,
                    max: 10,
                    pulse: 0.1,
                },
                speed: {
                    x: {
                        min: 0,
                        max: 0.6,
                    },
                    y: {
                        min: 0,
                        max: 0.6,
                    },
                },
                colors: {
                    background: "#1c1c1c",
                    particles: ["#e8998d", "#b0e298", "#eed2cc"],
                },
                blending: "overlay",
                opacity: {
                    center: 1,
                    edge: 0,
                },
                skew: 0,
                shapes: ["c"],
            });
        </script>

    </body>

    <script src="/js/textwrite.js"></script>
</html>
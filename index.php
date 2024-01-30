<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        <link rel="stylesheet" href="/css/index/bar.css" />
        <link rel="stylesheet" href="/css/index/top.css" />
        <link rel="stylesheet" href="/css/index/hidden.css" />
        <link rel="stylesheet" href="/css/index/about.css" />
        <link rel="stylesheet" href="/css/index/tech.css" />
        <link rel="stylesheet" href="/css/index/projects.css" />
        <link rel="stylesheet" href="/css/index/contact.css" />
        <link rel="stylesheet" href="/css/index/geral.css" />

        <title>Rodrigo Ferreira | Developer : Always Looking For a Good Challenge</title>
    </head>
    <body class="header finisher-header">
        
        <?php include "main_page/top.html" ?>

        <?php include "main_page/about.html" ?>

        <?php include "main_page/tech.html" ?>

        <?php include "main_page/projects.html" ?>

        <?php include "main_page/contacts.html" ?>

        <script
            src="js/finisher-header.es5.min.js"
            type="text/javascript"
        ></script>
        <script type="text/javascript">
            new FinisherHeader({
                count: 50,
                size: {
                    min: 2,
                    max: 28,
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
                    particles: ["#fbfcca", "#75863D", "#ffd0a7"],
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

    <script src="/js/bar.js"></script>
    <script src="/js/textwrite.js"></script>
    <script src="/js/scroll.js"></script>
    <script src="/js/carousel.js"></script>
</html>
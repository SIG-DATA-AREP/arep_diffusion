<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AREP DEV DIFFUSION</title>

    <!-- Add the link to the SCSS style sheet -->
    <link rel="stylesheet" href="styles.scss">

    <!-- React CDN links -->
    <script crossorigin src="https://unpkg.com/react@17/umd/react.development.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>

    <!-- Babel for JSX/React -->
    <script crossorigin src="https://unpkg.com/@babel/standalone/babel.min.js"></script>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>


    <!-- COMPONENTS -->
    <script type="text/babel">

    // Navigation.js
    const Navigation = () => {
        return (
            <nav>
                <div className="logo">
                    <img src="img/logo_arep.png" alt="AREP" />
                </div>
                <ul className="menu">
                    <li><a href="#">ACCUEIL</a></li>
                    <li><a href="#">CARTES</a></li>
                    <li><a href="#">SOURCES</a></li>
                </ul>
            </nav>
        );
    }

    //LEAFLET
    const LeafletMap = () => {
        React.useEffect(() => {
            // Create a Leaflet map centered at [0, 0] with zoom level 2
            const map = L.map('map', { scrollWheelZoom:false }).setView([48.84100818113699, 2.32004405985087], 12);

            // Add a circle marker to the map
            const circle = L.circle([48.84100818113699, 2.32004405985087], { color: 'grey' }).addTo(map);

            // Add a tile layer using CDN links
            L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.png?&api_key=a31200ab-bc94-4e77-b6d9-87fb29b52314', {
                attribution: '© Map tiles by Stamen Design'
            }).addTo(map);

            return () => {
                // Clean up the map when the component is unmounted
                map.remove();
            };
        }, []); // Empty dependency array ensures this effect runs once when the component mounts
        
        return (
            <div class='LeafletMap'>
                <img class='LeafletMap-arrow' src="img/left-arrow.png" alt="left" />
                <div id="map" style={{ height: '600px', width: '600px', borderRadius: '50%', margin:'0 auto' }}></div>
                <img class='LeafletMap-arrow' src="img/right-arrow.png" alt="right" />
            </div>
        );
    }

    </script>

    <!-- Your React components will be placed in the following script tag -->
    <script type="text/babel">

        const App = () => {
            return (
                <div id='main'>
                    <Navigation />
                    <LeafletMap />
                </div>
            );
        }

        // Render the React component
        ReactDOM.render(
            <App />,
            document.getElementById('root')
        );
    </script>
</head>
<body>

    <!-- The root div where React will be mounted -->
    <div id="root"></div>

</body>
</html>
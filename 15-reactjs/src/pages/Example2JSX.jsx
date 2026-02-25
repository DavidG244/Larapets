import BtnBack from "../components/BtnBack";

function Example2JSX() {

    //JS Variables

    const styles = {
        container: {
            backgroundColor: "#e8f5e8",
            color: '#143656',
            padding: "1.2rem",
            marginTop: "1rem",
            borderRadius: "10px",
            width: "270px"
        },
        title: {
            color: '#143656',
            fontSize: "1.5rem",
        },
        ul: {
            paddingLeft: "2rem",
            fontSize: "0.8rem"
        },
        img: {
            display: "flex",
            margin: "1rem auto",
            width: "200px"
        }
    }


    const pkName = "Pikachu";
    const pkType = "Electric";
    const pkLevel = 25;
    const pkAbilities = ["Static", "Lightning Rod"];
    const pkImage = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/25.png";

    return (
        <div className="container">
            <BtnBack />
            <h2>Example 2: JSX</h2>
            <p>Writing HTML-Like code within JavaScript using curly braces { } for JS expressions.</p>
            <div style={styles.container}>
            <h3 style={styles.title}>{pkName.toUpperCase()} (Lvl. {pkLevel})</h3>
            <img 
            src={pkImage}
            alt={pkName}
            style={styles.img}/>
            <p>Type: {pkType}</p>
            <p>Uppercase: {pkName.toUpperCase()}</p>
            <p>Abilities:</p>
            <ul style={styles.ul}>
                {pkAbilities.map((ability, index) => (
                    <li key={index}>{ability}</li>
                ))}
            </ul>
            <p>Is it started? {pkLevel === 25 ? "✅Yes" : "❌No"}</p>
            </div>
        </div>
    )
}

export default Example2JSX;
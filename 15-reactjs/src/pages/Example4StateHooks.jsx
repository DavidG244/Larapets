import { useState } from "react";
import BtnBack from "../components/BtnBack";
import CardPokemon from "../components/CardPokemon";

function Example4StateHooks() {

    const pokemons = [
        { id: 1, name: "gengar", type: "Ghost/Poison", power: 60, image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/94.png", legendary: false },
        { id: 2, name: "pikachu", type: "Electric", power: 50, image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/25.png", legendary: false },
        { id: 3, name: "mewtwo", type: "Psychic", power: 100, image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/150.png", legendary: true },
        { id: 4, name: "charizard", type: "Fire/Flying", power: 75, image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/6.png", legendary: false },
        { id: 5, name: "blastoise", type: "Water", power: 75, image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/9.png", legendary: false },
        { id: 6, name: "venusaur", type: "Grass/Poison", power: 75, image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/3.png", legendary: false },
        { id: 7, name: "dragonite", type: "Dragon/Flying", power: 90, image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/149.png", legendary: false },
        { id: 8, name: "articuno", type: "Ice/Flying", power: 85, image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/144.png", legendary: true },
        { id: 9, name: "zapdos", type: "Electric/Flying", power: 85, image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/145.png", legendary: true },
        { id: 10, name: "moltres", type: "Fire/Flying", power: 85, image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/146.png", legendary: true },
        { id: 11, name: "alakazam", type: "Psychic", power: 80, image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/65.png", legendary: false },
        { id: 12, name: "machamp", type: "Fighting", power: 85, image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/68.png", legendary: false },
        { id: 13, name: "golem", type: "Rock/Ground", power: 85, image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/76.png", legendary: false },
        { id: 14, name: "arcanine", type: "Fire", power: 80, image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/59.png", legendary: false },
        { id: 15, name: "lapras", type: "Water/Ice", power: 80, image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/131.png", legendary: false },
        { id: 16, name: "snorlax", type: "Normal", power: 75, image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/143.png", legendary: false },
        { id: 17, name: "dragonking", type: "Dragon", power: 95, image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/384.png", legendary: false },
        { id: 18, name: "gyarados", type: "Water/Flying", power: 85, image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/130.png", legendary: false },
        { id: 19, name: "ninetales", type: "Fire", power: 70, image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/38.png", legendary: false },
        { id: 20, name: "arbok", type: "Poison", power: 70, image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/24.png", legendary: false },
        { id: 21, name: "raichu", type: "Electric", power: 70, image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/26.png", legendary: false },
    ];

    const [capturedPokemon, setCapturedPokemon] = useState(null);
    const [isLoading, setIsLoading] = useState(false);
    const [capturedPokemons, setCapturedPokemons] = useState([]);

    const capturePokemon = () => {
        if (isLoading) return;
        setIsLoading(true);
        setTimeout(() => {
            const availablePokemons = pokemons.filter(p => !capturedPokemons.some(cp => cp.id === p.id));
            if (availablePokemons.length === 0) {
                setIsLoading(false);
                return;
            }
            const randomIndex = Math.floor(Math.random() * availablePokemons.length);
            const newCaptured = availablePokemons[randomIndex];
            setCapturedPokemon(newCaptured);
            setCapturedPokemons([...capturedPokemons, newCaptured]);
            setIsLoading(false);
        }, 3000);
    };

    const resetCapture = () => {
        setCapturedPokemons([]);
        setCapturedPokemon(null);
    };

    const availablePokemons = pokemons.filter(p => !capturedPokemons.some(cp => cp.id === p.id));

    return (
        <div className="container">
            <BtnBack />
            <h2>Example 4: State & Hooks</h2>
            <h3>(useState, useEffect)</h3>
            <p>Manage dynamic data and side effects.</p>

            <div style={{ textAlign: "center" }}>
                <button
                    style={{
                        padding: "0.8rem 1.5rem",
                        fontSize: "1.1rem",
                        backgroundColor: isLoading ? "#ccc" : "#FF4500",
                        color: "white",
                        border: "none",
                        borderRadius: "0.5rem",
                        cursor: isLoading ? "not-allowed" : "pointer",
                        fontWeight: "bold",
                        transition: "background-color 0.3s",
                        marginBottom: "2rem",
                        opacity: isLoading ? 0.6 : 1,
                    }}
                    onClick={capturePokemon}
                    disabled={isLoading}
                    onMouseEnter={(e) => !isLoading && (e.target.style.backgroundColor = "#FF6347")}
                    onMouseLeave={(e) => !isLoading && (e.target.style.backgroundColor = "#FF4500")}
                >
                    {isLoading ? "🔄 Capturando..." : "🎣 Capturar Pokemon"}
                </button>

                <h3>Pokemones Disponibles: {availablePokemons.length}/{pokemons.length}</h3>
                <div style={{
                    display: "flex",
                    flexWrap: "wrap",
                    justifyContent: "center",
                    marginBottom: "2rem",
                    gap: "0.5rem",
                }}>
                    {availablePokemons.map(pokemon => (
                        <CardPokemon
                            key={pokemon.id}
                            name={pokemon.name}
                            type={pokemon.type}
                            power={pokemon.power}
                            image={pokemon.image}
                            legendary={pokemon.legendary}
                        />
                    ))}
                </div>

                {/* Modal */}
                <div style={{
                    position: "fixed",
                    top: 0,
                    left: 0,
                    right: 0,
                    bottom: 0,
                    backgroundColor: "rgba(0, 0, 0, 0.7)",
                    display: capturedPokemon ? "flex" : "none",
                    justifyContent: "center",
                    alignItems: "center",
                    zIndex: 1000,
                }} onClick={() => setCapturedPokemon(null)}>
                    <div style={{
                        backgroundColor: "#1a1a1a",
                        borderRadius: "1.5rem",
                        padding: "2rem",
                        position: "relative",
                        maxWidth: "500px",
                        border: "3px solid #FFD700",
                    }} onClick={(e) => e.stopPropagation()}>
                        <button
                            style={{
                                position: "absolute",
                                top: "1rem",
                                right: "1rem",
                                backgroundColor: "#FF4500",
                                color: "white",
                                border: "none",
                                width: "40px",
                                height: "40px",
                                borderRadius: "50%",
                                fontSize: "1.2rem",
                                cursor: "pointer",
                                fontWeight: "bold",
                                transition: "background-color 0.3s",
                            }}
                            onClick={() => setCapturedPokemon(null)}
                            onMouseEnter={(e) => (e.target.style.backgroundColor = "#FF6347")}
                            onMouseLeave={(e) => (e.target.style.backgroundColor = "#FF4500")}
                        >
                            ✕
                        </button>
                        <h2 style={{ fontSize: "2rem", marginBottom: "1rem", color: "#FFD700" }}>
                            ⭐ ¡Capturaste un {capturedPokemon?.name.toUpperCase()}! ⭐
                        </h2>
                        <div style={{ display: "flex", justifyContent: "center" }}>
                            {capturedPokemon && (
                                <CardPokemon
                                    name={capturedPokemon.name}
                                    type={capturedPokemon.type}
                                    power={capturedPokemon.power}
                                    image={capturedPokemon.image}
                                    legendary={capturedPokemon.legendary}
                                />
                            )}
                        </div>
                    </div>
                </div>

                {capturedPokemons.length > 0 && (
                    <div style={{ marginTop: "3rem", paddingTop: "2rem", borderTop: "2px solid #FFD700" }}>
                        {availablePokemons.length === 0 && capturedPokemons.length === pokemons.length && (
                            <div style={{
                                backgroundColor: "#1a5f1a",
                                border: "2px solid #32CD32",
                                borderRadius: "1rem",
                                padding: "1.5rem",
                                marginBottom: "2rem",
                                textAlign: "center",
                            }}>
                                <h2 style={{ color: "#32CD32", fontSize: "1.8rem", margin: "0 0 1rem 0" }}>
                                    🎉 ¡Felicidades! ¡Capturaste todos los pokemones! 🎉
                                </h2>
                                <button
                                    style={{
                                        padding: "0.8rem 1.5rem",
                                        fontSize: "1rem",
                                        backgroundColor: "#32CD32",
                                        color: "#000",
                                        border: "none",
                                        borderRadius: "0.5rem",
                                        cursor: "pointer",
                                        fontWeight: "bold",
                                        transition: "background-color 0.3s",
                                    }}
                                    onClick={resetCapture}
                                    onMouseEnter={(e) => (e.target.style.backgroundColor = "#28a028")}
                                    onMouseLeave={(e) => (e.target.style.backgroundColor = "#32CD32")}
                                >
                                    🔄 Reiniciar
                                </button>
                            </div>
                        )}
                        <h3>Pokemones Capturados: {capturedPokemons.length}/{pokemons.length}</h3>
                        <div style={{
                            display: "flex",
                            flexWrap: "wrap",
                            justifyContent: "center",
                            gap: "0.5rem",
                        }}>
                            {capturedPokemons.map(pokemon => (
                                <CardPokemon
                                    key={pokemon.id}
                                    name={pokemon.name}
                                    type={pokemon.type}
                                    power={pokemon.power}
                                    image={pokemon.image}
                                    legendary={pokemon.legendary}
                                />
                            ))}
                        </div>
                    </div>
                )}
            </div>
        </div>
    )
}

export default Example4StateHooks;
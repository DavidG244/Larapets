import BtnBack from "../components/BtnBack";
import CardPokemon from "../components/CardPokemon";

function Example3Props() {

   //Data
    const pokemons = [
        { id: 1, name: "gengar", type: "Ghost/Poison", level: 30, power: 60, Abilitie: "Cursed Body", image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/94.png", legendary: false },
        { id: 2, name: "pikachu", type: "Electric", level: 25, power: 50, Abilitie: "Static", image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/25.png", legendary: false },
        { id: 3, name: "mewtwo", type: "Psychic", level: 70, power: 100, Abilitie: "Pressure", image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/150.png", legendary: true },
    ];


    //styles
    const style = {
        cards: {
            display: "flex",
            flexWrap: "wrap",
            justifyContent: "center",
        }
    }

    return (
        <div className="container">
            <BtnBack />
            <h2>Example 3: Props</h2>
            <p>Pass data from parent to children (like function arguments.)</p>
            <div style={style.cards}>
                {/* We pass different props to each card */}
                {
                    pokemons.map(pokemon => (
                        <CardPokemon
                            key={pokemon.id}
                            name={pokemon.name}
                            type={pokemon.type}
                            power={pokemon.power}
                            image={pokemon.image}
                            legendary={pokemon.legendary}
                        />
                    ))
                }
            </div>
        </div>

    )
}

export default Example3Props;
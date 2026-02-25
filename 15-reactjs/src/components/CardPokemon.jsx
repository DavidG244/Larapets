import './CardPokemon.css';

function CardPokemon({ name, type, power, image, legendary = false }) {

    const typeColors = {
        electric: "#FFD700",
        psychic: "#FF69B4",
        fire: "#FF4500",
        water: "#1E90FF",
        grass: "#32CD32",
        normal: "#9e9e9e",
        ghost: "#9932CC",
        poison: "#8A2BE2",
        flying: "#87CEEB",
        dragon: "#FF1493",
        ice: "#00BFFF",
        fighting: "#DC143C",
        ground: "#8B4513",
        rock: "#A9A9A9",
    };

    // Extraer el primer tipo si es compuesto (ej: "Ghost/Poison" -> "ghost")
    const primaryType = type?.split('/')[0].toLowerCase();
    const borderColor = typeColors[primaryType] || '#ccc';

    return (
        <div
            className='pokemon-card'
            style={{ borderColor: borderColor }}
        >
            {image && <img src={image} alt={name} className="pokemon-image" />}
            <h3>{name}</h3>
            <p className='pokemon-type'>Type: {type}</p>
            <p className="pokemon-power">Power: {power}</p>
            {legendary && <span className="legendary-badge">💫 Legendary 💫</span>}
        </div>
    )
}

export default CardPokemon;
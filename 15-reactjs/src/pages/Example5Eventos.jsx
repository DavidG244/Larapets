import BtnBack from "../components/BtnBack";
import { useState } from "react";
import "./Example5Eventos.css";

function Example5Eventos() {
    const [chosenPokemon, setChosenPokemon] = useState(null);
    const [hoveredPokemon, setHoveredPokemon] = useState(null);
    const [inputRange, setInputRange] = useState(0);

    const handleChoice = (name, event) => {
        setChosenPokemon(name);
    }
    // Event Hover: MouserEnter || Mouse Over
    const handleMouseEnter = (name) => {
        setHoveredPokemon(name)
    }
    // Event MouseLeave 
    const handleMouseLeave = () => {
        setHoveredPokemon(null)
    }
    //Event Input
    const handleInput = (e) => {
        setInputRange(e.target.value);
    }

    const titleH3 = {
        borderBottom: '2px dotted',
        paddingBottom: '1rem',
        marginBottom: '0.4rem'
    }

    const eventContainer = {
        flex: 1,
        marginBottom: '1.4rem',
        minWidth: '250px',
    }

    // removed inline hoverStyle; we'll use CSS classes for hover dialog

    const buttonStyle = {
        margin: '5px',
        padding: '10px 20px',
        fontSize: '16px',
        cursor: 'pointer',
        backgroundColor: '#4caaaf8a',
        color: 'white',
        border: 'none',
        borderRadius: '4px',
        display: 'flex',
        flexDirection: 'column',
        justifyContent: 'center',
        alignItems: 'center',
        gap: '0.5rem'
    }

    const btnClick = {
        display: 'flex',
        gap: '10px',
        marginTop: '8px'
    }

    const rangeStyle = {
        accentColor: '#4caaaf8a',
        width: '100%',
        marginTop: '1rem',
    }

    const outPut = {
        fontSize: '4rem',
        textAlign: 'center',
        marginBottom: '2rem',
    }

    return (
        <div className='container'>
            <BtnBack />
            <h2>Example 5 - Event Handling</h2>
            <p>Respond to user interactions (click, hover, input changes, etc.)</p>
            <div style={eventContainer}>
                <h3 style={titleH3}>Click Event:</h3>
                <button
                    onClick={(e) => handleChoice('Bulbasaur', e)}
                    className="choice-button"
                >
                    <span style={{ zoom: 2.4 }}>🎋</span> Bullbasaur
                </button>
                <button
                    onClick={(e) => handleChoice('Charmander', e)}
                    className="choice-button"
                >
                    <span style={{ zoom: 2.4 }}>🔥</span> Charmander
                </button>
                <button
                    onClick={(e) => handleChoice('Squirtle', e)}
                    className="choice-button"
                >
                    <span style={{ zoom: 2.4 }}>💧</span> Squirtle
                </button>
                {chosenPokemon && (
                    <div className="choice-dialog">
                        You chose: {chosenPokemon}
                    </div>
                )
                }
                <div style={eventContainer}>
                    <h3 style={titleH3}>MouseEnter/MouseLeave Event:</h3>
                </div>
                <div style={btnClick}>
                    <button
                        onMouseEnter={() => handleMouseEnter('Pikachu')}
                        onMouseLeave={handleMouseLeave}
                        className={hoveredPokemon === 'Pikachu' ? 'hover-button active' : 'hover-button'}
                    >
                        Hover here!
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/25.png" alt="Pikachu" />
                    </button>
                    <button
                        onMouseEnter={() => handleMouseEnter('Mewtwo')}
                        onMouseLeave={handleMouseLeave}
                        className={hoveredPokemon === 'Mewtwo' ? 'hover-button active' : 'hover-button'}
                    >
                        Hover here!
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/150.png" alt="Mewtwo" />
                    </button>
                </div>
                {hoveredPokemon && (
                    <div className="choice-dialog hover-dialog">
                        You hovered: {hoveredPokemon}
                    </div>

                )}
                <h3 style={titleH3}>Input Event:</h3>
                <input
                    style={rangeStyle}
                    onInput={handleInput}
                    type="range"
                    min="0"
                    max="100"

                />
                <span style={{display: 'block', textAlign: 'center'}}>power:</span>
                {outPut && (
                    <div style={outPut}>{inputRange}</div>
                )}
            </div>
        </div>
    );
}

export default Example5Eventos;
import BtnBack from "../components/BtnBack";
import { useState } from "react";

function Example5Eventos() {
    const [chosenPokemon, setChosenPokemon] = useState(null);

    const handleChoice = (name, event) => {
        setChosenPokemon(name);
    }

    const buttonStyle = {
        margin: '5px',
        padding: '10px 20px',
        fontSize: '16px',
        cursor: 'pointer'
        
    };

    return (
        <div className='container'>
            <BtnBack />
            <h2>Example 5 - Event Handling</h2>
            <p>Respond to user interactions (click, hover, input changes, etc.)</p>
            <div>
                <h3>Click Event</h3>
                <button
                    onClick={(e) => handleChoice('Bulbasaur', e)}
                    style={buttonStyle}
                >
                    Bullbasaur
                </button>
                <button
                    onClick={(e) => handleChoice('Charmander', e)}
                    style={buttonStyle}
                >
                    Charmander
                </button>
                <button
                    onClick={(e) => handleChoice('Squirtle', e)}
                    style={buttonStyle}
                >
                    Squirtle
                </button>
                {chosenPokemon && (
                    <div>
                        You chose: {chosenPokemon}
                    </div>
                )
                }
            </div>
        </div>
    );
}

export default Example5Eventos;